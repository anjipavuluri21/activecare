<?php

$username='dessieguila@gmail.com';
		$password='mishari12';
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL,'https://apikw.myfatoorah.com/Token');
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query(array('grant_type' => 'password','username' => $username,'password' =>$password)));
		$result = curl_exec($curl);
		$info = curl_getinfo($curl);
		curl_close($curl);
		$json = json_decode($result, true);
                		 echo "<pre>";print_r($json);die;
