<?php
namespace App\Helpers;

use Log;
use App\Model\Extensions\MDMConfig;
use App\Model\Profile;
use App\Model\Address;
use App\Model\Contact;
use App\Model\Identity;
use App\Model\BankAccount;
use App\Model\Unit;
use App\Model\Attachment;
use App\Model\Relationship;
use App\Model\Lookups;
use App\Model\Lookups\MDMCity;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;


class Helper
{
    //Value config
    private static $configs = null;

    public static function configs()
    {
        if (self::$configs !== null) {
            return self::$configs;
        }
        self::$configs = MDMConfig::pluck('value', 'key')->all();
        return self::$configs;
    }
    //End config

    /**
     * [sendMail description]
     * @param  [type] $view           [description]
     * @param  array  $data           [description]
     * @param  array  $config         [description]
     * @param  array  $fileAttach     [description]
     * @param  array  $fileAttachData [description]
     * @return [type]                 [description]
     */
    public static function sendMail($view, $data = array(), $config = array(), $fileAttach = array(), $fileAttachData = array())
    {
        if (!empty(self::configs()['email_action_mode'])) {
            try {
                Mail::send(new \App\Mail\SendMail($view, $data, $config, $fileAttach, $fileAttachData));
            } catch (\Exception $e) {
                Log::error("Sendmail view:" . $view . PHP_EOL . $e->getMessage());
            }
        } else {
            return false;
        }
    }

    public static function HighlightCompare()
    {
        $style = [];
        $u_id   = Profile::on(Session::get('unit_name'))->where('id',request()->segment(3))->pluck('u_id')->first();

        $db_golden  = Profile::on('pgsql')
                        ->where('u_id',$u_id)
                        ->first(); 
        $db_unit    = Profile::on(Session::get('unit_name'))
                        ->where('u_id',$u_id)
                        ->first();

        //field type select
        $b = ['pob','status_kawin_id','mortalitas_id','category_user_id','gender','kewarganegaraan_id','negara_id','religion_id','suku_id','pendidikan_id','profesi_id','golongan_darah_id','propinsi_id','kota_id','kecamatan_id','kelurahan_id','category_tempat_tinggal_id','status_keaktifan_id','status_data','status_tempat_tinggal_id','type_tempat_tinggal_id','type_contact_id','category_identity_id','nama_bank','cabang','unit','type_file_id','relationship_id'];

        //get column name of table
        $keys = array_keys($db_unit->getAttributes());

        foreach ($keys as $key => $value) {
            if(in_array($value,$b) && $db_golden[$value] != $db_unit[$value]){
                $a['select'][] = 'select2-'.$value;                    
            }
            elseif(!in_array($value,$b) && $db_golden[$value] != $db_unit[$value]){
                $a['text_profile'][] = $value;
            }
        }

        $tab = [new Address,new Contact,new Identity,new BankAccount,new Unit,new Attachment,new Relationship];
        $name = ['address','contact','identity','bank','unit','Attachment','relationship'];

        foreach ($tab as $num => $table) {
            $db_golden  = $table::on('pgsql')
                            ->where('u_id', $u_id)
                            ->orderBy('id')
                            ->get();
            $db_unit    = $table::on(Session::get('unit_name'))
                            ->where('u_id', $u_id)
                            ->orderBy('id')
                            ->get();

            $keys = [];
            
            //get column name of table
            if(count($db_unit)!=0){
                $keys = array_keys($db_unit[0]->getAttributes());
            }

            foreach ($db_golden as $key => $data) {
                foreach ($keys as $value) {
                    $newkey = $key+1;
                    if(in_array($value,$b) && $data->$value != $db_unit[$key]->$value){
                        $a['select'][] = 'select2-'.$name[$num].$newkey.$value;                    
                    }
                    elseif(!in_array($value,$b) && $data->$value != $db_unit[$key]->$value){
                        $a['text'][] = $name[$num].'['.$newkey.']['.$value.']';
                    }
                }
            }
        }

        if(isset($a['select'])){
            foreach ($a['select'] as $value) {
                $style[] = " 
                    .select2 span[aria-labelledby*='".$value."'] {
                        border: 2px solid red;
                    }
                ";
            }    
        }
        if(isset($a['text'])){
            foreach ($a['text'] as $value) {
                $style[] = " 
                    input[name*='".$value."'] {
                        border: 2px solid red;
                    }
                ";
            }
        }
        if(isset($a['text_profile'])){
            foreach ($a['text_profile'] as $value) {
                $style[] = " 
                    input[name='".$value."'] {
                        border: 2px solid red;
                    }
                ";
            }
        }

        return $style;
    }

    public static function pob($id)
    {   
        $city = MDMCity::where('id',$id)->pluck('name')->first();
        
        return $city;
    }

    public static function businessUnitInstanceByUnit($connectionUnit)
    {
        $businessUnitModel = static::createBusinessUnitInstance($connectionUnit);

        if (static::isValidBusinessUnitModel($businessUnitModel)) {
            $businessUnitProfileInstance = new $businessUnitModel;
        } else {
            // throw new \Exception("Error Processing Request", 1);
            throw new \Exception("Business Unit class path not found");
            // dd($connectionUnit);
        }

        return $businessUnitProfileInstance;
    }

    public static function businessUnitFullNameByUnit($unitCode)
    {   
        switch ($unitCode) {
            case 'FINA':
                $businessUnitFullName = 'Finance';
                break;

            case 'INSU':
                $businessUnitFullName = 'Insurance';
                break;

            case 'KVIS':
                $businessUnitFullName = 'KVision';
                break;
            
            case 'LEAS':
                $businessUnitFullName = 'Leasing';
                break;
            
            case 'LIFE':
                $businessUnitFullName = 'Life';
                break;

            case 'PLAY':
                $businessUnitFullName = 'PLAY';
                break;

            case 'SEKU':
                $businessUnitFullName = 'Sekuritas';
                break;

            case 'MSSO':
                $businessUnitFullName = 'SSO';
                break;
            
            case 'TFTH':
                $businessUnitFullName = 'FThing';
                break;

            case 'VISI':
                $businessUnitFullName = 'Vision';
                break;

            case 'VPLS':
                $businessUnitFullName = 'VPlus';
                break;

            default:
                $businessUnitFullName = 'Test';
                break;
        }

        return $businessUnitFullName;
    }

    private static function createBusinessUnitInstance($unitCode)
    {
        $businessUnitModelsNamespace = 'App\\Model\\BusinessUnits';
        $businessUnitModel = $businessUnitModelsNamespace . '\\' . $unitCode . '\\Profile';
        return $businessUnitModel;
    }

    private static function isValidBusinessUnitModel($classPath)
    {
        return class_exists($classPath);
    }

    public static function getBusinessUnitsLookups()
    {
        $lookupsArr = [];
        $distinctedUnits = Lookups::select('unit')
                                ->whereNotNull('unit')
                                ->groupBy('unit')
                                ->pluck('unit')
                                ->toArray();
                                // ->toSql();

        $descriptionLookups = [];
        foreach ($distinctedUnits as $key) {
            $descriptionLookups[$key] = Lookups::select('category', 'lookup_name', 'description')->where('unit', $key)->get();
        }

        foreach ( $descriptionLookups as $unit => $entities) {
            foreach ($entities as $entity) {
                $lookupsArr[$unit][$entity->category][$entity->lookup_name] = $entity->description;
            }   
        }

        return $lookupsArr;
    }
}
