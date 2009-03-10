<?php

/**
 * @author  Neil Crosby <neil@neilcrosby.com>
 * @license Creative Commons Attribution-Share Alike 3.0 Unported 
 *          http://creativecommons.org/licenses/by-sa/3.0/
 **/
class TheCodeTrainCssValidatorProviders {
    
    public static function validCssProvider() {
        return array(
            array('p {display: block;}'),
            array('p{display: block;}'),
            array('p { display: block}'),
            array('p { display: block }'),
        );
    }

    public static function invalidCssProvider() {
        return array(
            array('<p>Some text</pee>'),
            array('itvehrb jgskhg; fstoiaeoyufsfgoi'),
            array("p { bllllllllah;"),
            array("p { display: blah;}"),
            array("p { *display: blah;}"),
        );
    }
    
    public static function validCssWithExceptionsProvider() {
        return array(
            array(array('p {display: block; *display: inline;}', array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array('p {*display: inline;display: block;}', array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array('p { display: block; _display: inline}', array('underscore_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array('p {_display: inline;display: block }', array('underscore_prop'=>TheCodeTrainCssValidator::ALLOW))),
        );
    }

    public static function invalidCssWithExceptionsProvider() {
        return array(
            array(array('<p>Some text</pee>', array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array('itvehrb jgskhg; fstoiaeoyufsfgoi', array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array("p { bllllllllah;", array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array("p { display: blah; *display: inline;}", array('star_prop'=>TheCodeTrainCssValidator::ALLOW))),
            array(array("p { *display: blah;}", array('underscore_prop'=>TheCodeTrainCssValidator::ALLOW))),
        );
    }
    
    public static function validValidatorUrlProvider() {
        return array(
            //array('http://jigsaw.w3.org/css-validator/validator'),
            array('http://127.0.0.1:8080/css-validator/validator'),
        );
    }
    
    public static function invalidValidatorUrlProvider() {
        return array(
            array('http://thisdefinitelydoesntexist.thecodetrain.co.uk/'),
        );
    }
    
}

?>