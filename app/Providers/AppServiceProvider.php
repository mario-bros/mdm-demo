<?php

namespace App\Providers;

use App\Helpers\Helper;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Helpers\CursorPaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    protected $ssl_mode = 0;

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Way\Generators\GeneratorsServiceProvider::class);
            $this->app->register(\Xethron\MigrationsGenerator\MigrationsGeneratorServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->bootScart();
        if ($this->ssl_mode) {
            \URL::forceScheme('https');
        }

        \Illuminate\Database\Eloquent\Builder::macro('cursorPaginate', function ($perPage, $options, bool $emptyRows = false) {
            // Get current pagination cursore setting
            $paginationCursor = CursorPaginator::currentCursor();

            $arrCursor = (array) $paginationCursor;

            if ( $arrCursor == [] )
                $currentPage = 1;
            else
                $currentPage = ( $arrCursor['page'] == null ) ? 1 : $arrCursor['page'];

            // dd($paginationCursor);
            // dd($currentPage);

            if ($paginationCursor) {
                $apply = function ($query, $cursor, $currentPage) use (&$apply) {
                    $query->where(function ($query) use ( $cursor, $currentPage, $apply) {
                        $direction = $cursor['direction'];
                        // dd($direction);

                        // This is the recipe for accurate list
                        if ($direction == 'desc') {
                            // Read from the session
                            $searchCompareSets = [];
                            $searchCompareSets['customer_id'] = "";
                            $searchCompareSets['dob'] = [];
                            $searchCompareSets['dob']['start'] = "";
                            $searchCompareSets['dob']['end'] = "";
                            $searchCompareSets['kota'] = "";
                            $searchCompareSets['full_name'] = "";
                            $searchCompareSets['email1'] = "";
                            $searchCompareSets['unit'] = "";
                            $searchCompareSets['_page'] = $currentPage;

                            // $urlQuery = request()->all();
                            foreach ( $_GET as $key => $val) {

                                if ( is_array($key) ) {
                                    foreach ($key as $k => $v) {
                                        $searchCompareSets[$key][$k] = $v;
                                    }
                                }

                                $searchCompareSets[$key] = $val;
                            }
                            unset($searchCompareSets['cursor']);
                            unset($searchCompareSets['_pjax']);
                            // dd($searchCompareSets);
                            // dd(session()->all());

                            $pageKey = base64_encode(json_encode($searchCompareSets)); 
                            $keyBorders = session($pageKey);
                            // dd($keyBorders);

                            $query->where('id', '>=', $keyBorders['first_id']);
                            $query->where('id', '<=', $keyBorders['last_id']);
                        } else {
                            $value = $cursor['id'];
                            $query->where('id', '>', $value);
                        }
                        
                    });
                };
        
                $apply($this, $arrCursor, $currentPage);
            }

            $this->orderBy('id', 'asc');
            // dd( $this->toSql() );

            // Take limited records
            if ( $emptyRows ) {
                $items = $this->limit(0)->get();
            } else {
                $searchCompareSets = [];
                $searchCompareSets['customer_id'] = "";
                $searchCompareSets['dob'] = [];
                $searchCompareSets['dob']['start'] = "";
                $searchCompareSets['dob']['end'] = "";
                $searchCompareSets['kota'] = "";
                $searchCompareSets['full_name'] = "";
                $searchCompareSets['email1'] = "";
                $searchCompareSets['unit'] = "";
                $searchCompareSets['_page'] = $currentPage;

                foreach ( $_GET as $key => $val) {

                    if ( is_array($key) ) {
                        foreach ($key as $k => $v) {
                            $searchCompareSets[$key][$k] = $v;
                        }
                    }

                    $searchCompareSets[$key] = $val;
                }
                unset($searchCompareSets['cursor']);
                unset($searchCompareSets['_pjax']);

                if ( ! empty($arrCursor)) {
                    // Any next / previous page detected
                    if ( $arrCursor['direction'] == 'desc' ) {
                        // If user come to the previous page
                        $items = $this->limit($perPage + 1)->get();
                    } else {
                        // If user come to the next page
                        $items = $this->limit($perPage + 1)->get();
                        if ( $items->count() > 0 ) {
                            // Write to session
                            $pageKey = base64_encode(json_encode($searchCompareSets));
                            $firstID = $items->first()->id;
                            $lastID = $items->last()->id;
                            $keyBorders = [
                                'first_id' => $firstID, 
                                'last_id' => $lastID,
                                'currentPage' => $currentPage
                            ];
                            session([$pageKey => $keyBorders]);
                            // dd(session()->all());
                        }
                    }
                } else {
                    // The very first page with search result
                    $items = $this->limit($perPage + 1)->get();

                    if ( $items->count() > 0 ) {
                        // Write to session
                        $pageKey = base64_encode(json_encode($searchCompareSets));
                        $firstID = $items->first()->id;
                        $lastID = $items->last()->id;
                        $keyBorders = [
                            'first_id' => $firstID, 
                            'last_id' => $lastID,
                            'currentPage' => $currentPage
                        ];
                        session([$pageKey => $keyBorders]);
                        // dd($searchCompareSets);
                        // dd(session()->all());
                    }
                }
            }
            // dd( $this->toSql() );
            // dd(session()->all());

            if ($items->count() <= $perPage) {
                return new CursorPaginator($items, $perPage, $currentPage, $options);
            }

            return new CursorPaginator($items, $perPage, $currentPage, $options, array_map(function ($column) use ($items) {
                // dd( $column );
                return $items->last()->{$column};
            }, array_keys([ 'id' => 'asc'])));
        });

        /*(DB::listen(function($query) {
            Log::debug('An informational message of query executed: ' . $query->sql);
        });*/
    }

    public function bootScart()
    {
        try {
            // Config for email
            $configs        = Helper::configs();
            $this->ssl_mode = $configs['site_ssl'] ?? false;
            config(['mail.driver' => ($configs['email_action_smtp_mode']) ? 'smtp' : 'sendmail']);
            config(['mail.host' => empty($configs['smtp_host']) ? env('MAIL_HOST', '') : $configs['smtp_host']]);
            config(['mail.port' => empty($configs['smtp_port']) ? env('MAIL_PORT', '') : $configs['smtp_port']]);
            config(['mail.encryption' => empty($configs['smtp_security']) ? env('MAIL_ENCRYPTION', '') : $configs['smtp_security']]);
            config(['mail.username' => empty($configs['smtp_user']) ? env('MAIL_USERNAME', '') : $configs['smtp_user']]);
            config(['mail.password' => empty($configs['smtp_password']) ? env('MAIL_PASSWORD', '') : $configs['smtp_password']]);
            config(['mail.from' =>
                [
                    'address' => 'julio.notodiprodyo@mncgroup.com',
                    'name'    => 'Julio Notodiprodyo',
                ],
            ]);
        } catch (\Exception $e) {

        }
    }
}
