<?php

namespace App\Admin\Actions\Post;

use App\Model\GlobalReports\Profile;
use App\Model\GlobalReports\OrderStatus;
use App\Helpers\Helper;

use Illuminate\Http\Request;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Actions\RowAction;
use App\Model\Extensions\MDMEmailTemplate;

class Certified extends RowAction
{
    public $name = 'Certified';

    public function form($id = null)
    {
        // Get data for send mail
        $this->hidden('user')->default(Admin::user()->name);
         // Hidden Form
        $this->hidden('idflagprocess');
        $this->hidden('flag_process')->default($id->flag_process);
        $this->hidden('user_id')->default(Admin::user()->id);
        // End Hidden Form
        $this->text('u_id', 'UID')->default($id->u_id)->readonly();
        $this->text('full_name', 'Full Name')->default($id->full_name)->readonly();
        $this->textarea('message', 'Message ( Field cannot be left blank )')->rules('required');
    }

    public function handle($id, Request $request)
    {
        // Your proposed logic...
        $uID = $request->get('u_id');
        $userID = $request->get('user_id');
        $message = $request->get('message');
        $flagProcess = $request->get('flag_process');
        $idflagprocess = $request->get('idflagprocess');

        $user = $request->get('user');
        $fullName = $request->get('full_name');

        $configs = [];
        $configs['0'] = 1;
        $configs['1'] = 2;
        $configs['2'] = 3;

        $fp = isset($configs[$flagProcess]) ? $configs[$flagProcess] : $flagProcess;

        $proposedData = Profile::where('u_id', '=', $uID);

        $result = $proposedData->update(["flag_process" => $fp, "updated_by" => Admin::user()->id]);
        if ($result) {
            $message = OrderStatus::updateOrCreate(
                [
                    'id' => $idflagprocess,
                ],
                [
                    'u_id' => $uID,
                    'user_id' => $userID,
                    'message' => $message,
                    'flag_process' => $fp,
                    'is_rejected' => 0,
                ]
            );
        }

        // Function send mail
        $dataFind        = [
            '/\{\{\$user\}\}/', '/\{\{\$fullName\}\}/'
        ];
        $dataReplace = [
            $user, $fullName
        ];
        $contentCustomer = MDMEmailTemplate::where([
            ['group', '=', 'email_certified'], ['status', '=', '1'],
        ])->first();
        $contentCustomer    = preg_replace($dataFind, $dataReplace, $contentCustomer->text);
        $data_mail_customer = [
            'content' => $contentCustomer,
        ];
        $config = [
            'to'      => \Admin::user()->email,
            'replyTo' => 'julio.notodiprodyo@mncgroup.com',
            'subject' => 'Customer Certified',
        ];

        Helper::sendMail('mail.email_certified', $data_mail_customer, $config, []);

        return $this->response()->success('Certified submitted')->refresh();
    }

}
