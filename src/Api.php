<?php
namespace usualtool\Api;
use library\UsualToolInc;
class Api{
      public function __construct(){
            global$config;
            $this->authcode=$config["UTCODE"];
            $this->authurl=$config["UTFURL"];
            $this->type="openapi";
      }
      public function Run($api,$param){
            $from=UsualToolInc\UTInc::CurPageUrl();
            $url=$this->authurl."?AuthCode=".$this->authcode."&FromUrl=".$from."&Type=".$this->type."-".$api;
            $result=UsualToolInc\UTInc::HttpPost($url,$param);
            return str_replace("#","$",str_replace("&","=",UsualToolInc\UTInc::StrSubstr("<php>","</php>",$result)));
      }
}
