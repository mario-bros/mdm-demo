<?php
namespace App\Helpers;

class CompareHelper
{
    public static function inputTextDisplay($value)
    {
        $opts = ['style' => 'width: 200px', 'class' => 'form-control', 'disabled'];
        return self::displayTextInput($value, $opts);
    }

    public static function inputTextDisplayWithErr($value)
    {
        $opts = ['style' => 'width: 200px', 'class' => 'form-control has-error', 'disabled'];
        return self::displayTextInput($value, $opts);
    }

    public static function inputTextDisplayShorten($value)
    {
        $opts = ['style' => 'display: inline;width: 90px', 'class' => 'form-control', 'disabled'];
        return self::displayTextInput($value, $opts);
    }

    public static function inputTextDisplayShortenWithErr($value)
    {
        $opts = ['style' => 'display: inline;width: 90px', 'class' => 'form-control has-error', 'disabled'];
        return self::displayTextInput($value, $opts);
    }

    public static function inputTextAreaDisplay($value)
    {   
        $opts = ['style' => 'width: 200px', 'class' => 'form-control', 'disabled', 'rows' => 3, 'cols' => 50];
        return self::displayTextAreaInput($value, $opts);
    }

    public static function inputTextAreaDisplayWithErr($value)
    {
        $opts = ['style' => 'width: 200px', 'class' => 'form-control has-error', 'disabled', 'rows' => 3, 'cols' => 50];
        return self::displayTextAreaInput($value, $opts);
    }



    protected static function displayTextInput($value, $opts = [])
    {
        return \Form::text('', $value, $opts);
    }

    protected static function displayTextAreaInput($value, $opts = [])
    {
        return \Form::textarea('', $value, $opts);
    }
}
