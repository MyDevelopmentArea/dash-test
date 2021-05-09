<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Test extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		//API URL
		$url = 'http://localhost/dash/api/user';

		//API key
		$apiKey = 'DASH@123';

		//Auth credentials
		$username = "admin";
		$password = "1234";
		$filterData = array(
			'search' => '',
			'gender' => '',
			'limit' => 5,
			'page' => 1
		);
		//create a new cURL resource
		$url .= '?' . http_build_query($filterData);
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		echo $result = curl_exec($ch);

		//close cURL resource
		curl_close($ch);
	}

	public function insertRecord()
	{

		//API URL
		$url = 'http://localhost/dash/api/user/';

		//API key
		$apiKey = 'DASH@123';

		//Auth credentials
		$username = "admin";
		$password = "1234";
		//user information



		$userData = array(
			'first_name' => 'Piggy',
			'last_name' => 'Havoc',
			'email' => 'phavoc0@meetup.com',
			'gender' => 'Male',
			'ip_address' => '251.102.141.246',
			'genres' => 'Comedy|Horror|Sci-Fi|Thriller',
			'misc' => ''

		);

		//create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);

		echo $result = curl_exec($ch);

		//close cURL resource
		curl_close($ch);
	}
	public function insertMultipleRecord()
	{

		//API URL
		$url = 'http://localhost/dash/api/user/';

		//API key
		$apiKey = 'DASH@123';

		//Auth credentials
		$username = "admin";
		$password = "1234";
		//user information

		$userRawData = json_decode('[{"id":1,"first_name":"Piggy","last_name":"Havoc","email":"phavoc0@meetup.com","gender":"Male","ip_address":"251.102.141.246","genres":"Comedy|Horror|Sci-Fi|Thriller","misc":"᠎"},
{"id":2,"first_name":"Marion","last_name":"Jakeway","email":"mjakeway1@tuttocitta.it","gender":"Male","ip_address":"91.132.175.211","genres":"Comedy|Documentary","misc":"() { 0; }; touch /tmp/blns.shellshock1.fail;"},
{"id":3,"first_name":"Kai","last_name":"Wolton","email":"kwolton2@exblog.jp","gender":"Female","ip_address":"17.112.23.41","genres":"Adventure|Drama|Mystery|Thriller","misc":"👩🏽"},
{"id":4,"first_name":"Janis","last_name":"Aldcorne","email":"jaldcorne3@a8.net","gender":"Female","ip_address":"251.28.36.112","genres":"Comedy|Horror","misc":""},
{"id":5,"first_name":"Drusie","last_name":"Melato","email":"dmelato4@apple.com","gender":"Female","ip_address":"116.219.239.177","genres":"Romance","misc":"̡͓̞ͅI̗̘̦͝n͇͇͙v̮̫ok̲̫̙͈i̖͙̭̹̠̞n̡̻̮̣̺g̲͈͙̭͙̬͎ ̰t͔̦h̞̲e̢̤ ͍̬̲͖f̴̘͕̣è͖ẹ̥̩l͖͔͚i͓͚̦͠n͖͍̗͓̳̮g͍ ̨o͚̪͡f̘̣̬ ̖̘͖̟͙̮c҉͔̫͖͓͇͖ͅh̵̤̣͚͔á̗̼͕ͅo̼̣̥s̱͈̺̖̦̻͢.̛̖̞̠̫̰"},
{"id":6,"first_name":"Belia","last_name":"Nan Carrow","email":"bnancarrow5@businessinsider.com","gender":"Female","ip_address":"108.212.52.73","genres":"Drama|Mystery","misc":"社會科學院語學研究所"},
{"id":7,"first_name":"Gabrila","last_name":"Portman","email":"gportman6@geocities.jp","gender":"Female","ip_address":"70.121.181.84","genres":"Drama|Romance","misc":"울란바토르"},
{"id":8,"first_name":"Birch","last_name":"Tremlett","email":"btremlett7@eventbrite.com","gender":"Male","ip_address":"84.7.162.62","genres":"Action|Comedy|Musical","misc":"ثم نفس سقطت وبالتحديد،, جزيرتي باستخدام أن دنو. إذ هنا؟ الستار وتنصيب كان. أهّل ايطاليا، بريطانيا-فرنسا قد أخذ. سليمان، إتفاقية بين ما, يذكر الحدود أي بعد, معاملة بولندا، الإطلاق عل إيو."},
{"id":9,"first_name":"Lotty","last_name":"Oneal","email":"loneal8@zimbio.com","gender":"Female","ip_address":"208.248.132.43","genres":"Horror|Sci-Fi","misc":"(╯°□°）╯︵ ┻━┻)  "},
{"id":10,"first_name":"Norine","last_name":"Korneichuk","email":"nkorneichuk9@ox.ac.uk","gender":"Female","ip_address":"105.193.162.119","genres":"Action|Adventure|Drama","misc":"../../../../../../../../../../../etc/hosts"},
{"id":11,"first_name":"Marigold","last_name":"Pomfrey","email":"mpomfreya@com.com","gender":"Female","ip_address":"110.133.213.147","genres":"Comedy|Romance","misc":"Z̮̞̠͙͔ͅḀ̗̞͈̻̗Ḷ͙͎̯̹̞͓G̻O̭̗̮"},
{"id":12,"first_name":"Venita","last_name":"Cawkill","email":"vcawkillb@gmpg.org","gender":"Female","ip_address":"153.217.56.150","genres":"Romance","misc":"0️⃣ 1️⃣ 2️⃣ 3️⃣ 4️⃣ 5️⃣ 6️⃣ 7️⃣ 8️⃣ 9️⃣ 🔟"},
{"id":13,"first_name":"Veriee","last_name":"Easterbrook","email":"veasterbrookc@studiopress.com","gender":"Female","ip_address":"147.34.154.91","genres":"Animation|Comedy","misc":null},
{"id":14,"first_name":"Hartwell","last_name":"Dauncey","email":"hdaunceyd@photobucket.com","gender":"Male","ip_address":"58.52.159.245","genres":"Crime|Drama","misc":"﻿"},
{"id":15,"first_name":"Adan","last_name":"Tinham","email":"atinhame@cafepress.com","gender":"Female","ip_address":"197.41.201.3","genres":"Adventure|Children|Comedy","misc":"0.00"},
{"id":16,"first_name":"Carol-jean","last_name":"Routledge","email":"croutledgef@amazon.de","gender":"Female","ip_address":"155.131.103.147","genres":"Children|Comedy","misc":"🐵 🙈 🙉 🙊"},
{"id":17,"first_name":"Francois","last_name":"Stuchbery","email":"fstuchberyg@bravesites.com","gender":"Male","ip_address":"65.103.244.33","genres":"Comedy","misc":"✋🏿 💪🏿 👐🏿 🙌🏿 👏🏿 🙏🏿"},
{"id":18,"first_name":"Mariya","last_name":"Collopy","email":"mcollopyh@auda.org.au","gender":"Female","ip_address":"218.100.188.42","genres":"Children|Comedy","misc":"NULL"},
{"id":19,"first_name":"Ashil","last_name":"Wonfor","email":"awonfori@gnu.org","gender":"Female","ip_address":"36.132.72.162","genres":"Drama|Horror|Sci-Fi","misc":"../../../../../../../../../../../etc/hosts"},
{"id":20,"first_name":"Trip","last_name":"Farlane","email":"tfarlanej@nih.gov","gender":"Male","ip_address":"220.109.102.138","genres":"Comedy","misc":"👩🏽"},
{"id":21,"first_name":"Hugo","last_name":"Hutten","email":"hhuttenk@plala.or.jp","gender":"Male","ip_address":"57.208.6.166","genres":"(no genres listed)","misc":"¡™£¢∞§¶•ªº–≠"},
{"id":22,"first_name":"Dalila","last_name":"Litchmore","email":"dlitchmorel@globo.com","gender":"Female","ip_address":"241.57.142.148","genres":"Adventure|Animation|Children|Comedy|Fantasy|Musical","misc":"⁰⁴⁵"},
{"id":23,"first_name":"Lou","last_name":"Voak","email":"lvoakm@google.es","gender":"Female","ip_address":"248.114.207.243","genres":"Drama|Romance","misc":"␣"},
{"id":24,"first_name":"Germayne","last_name":"Krook","email":"gkrookn@mozilla.com","gender":"Male","ip_address":"232.122.101.69","genres":"Drama","misc":null},
{"id":25,"first_name":"Ely","last_name":"Hambribe","email":"ehambribeo@sbwire.com","gender":"Male","ip_address":"234.153.15.162","genres":"Drama","misc":"🚾 🆒 🆓 🆕 🆖 🆗 🆙 🏧"},
{"id":26,"first_name":"Samantha","last_name":"Croxon","email":"scroxonp@sohu.com","gender":"Female","ip_address":"107.75.146.87","genres":"Comedy|Crime|Drama","misc":"NIL"},
{"id":27,"first_name":"Leyla","last_name":"Ormond","email":"lormondq@360.cn","gender":"Female","ip_address":"180.81.31.196","genres":"Horror|Sci-Fi","misc":"␢"},
{"id":28,"first_name":"Garvy","last_name":"Lebreton","email":"glebretonr@tumblr.com","gender":"Male","ip_address":"93.121.63.145","genres":"Comedy|Romance","misc":""},
{"id":29,"first_name":"Maximilianus","last_name":"Darcy","email":"mdarcys@sfgate.com","gender":"Male","ip_address":"213.7.178.71","genres":"Drama","misc":"test⁠test‫"},
{"id":30,"first_name":"Chaunce","last_name":"Azema","email":"cazemat@simplemachines.org","gender":"Male","ip_address":"89.204.144.193","genres":"Drama","misc":"-$1.00"}]', TRUE);

		foreach ($userRawData as $userData) {


			//create a new cURL resource
			$ch = curl_init($url);

			curl_setopt($ch, CURLOPT_TIMEOUT, 30);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("X-API-KEY: " . $apiKey));
			curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $userData);

			echo $result = curl_exec($ch);

			//close cURL resource
			curl_close($ch);
		}
	}
	public function updateRecord()
	{

		//API URL
		$url = 'http://localhost/dash/api/user/';

		//API key
		$apiKey = 'DASH@123';

		//Auth credentials
		$username = "admin";
		$password = "1234";
		//user information
		$userData = array(
			'id' => 1,
			'first_name' => 'Piggy',
			'last_name' => 'HavocS',
			'email' => 'phavoc0@meetup.com',
			'gender' => 'Male',
			'ip_address' => '251.102.141.246',
			'genres' => 'Comedy|Horror|Sci-Fi|Thriller',
			'misc' => ''

		);

		//create a new cURL resource
		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-API-KEY: ' . $apiKey, 'Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($userData));

		echo $result = curl_exec($ch);

		//close cURL resource
		curl_close($ch);
	}
}
