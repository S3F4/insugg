<?php
/**
 * Created by PhpStorm.
 * User: sefa
 * Date: 17.08.2015
 * Time: 16:25
 */

namespace App\Module;


/**
 * Class ApiService
 * @package App\Module
 * @author sefa@dehaa.com
 * @version 0.1
 * @since 0.1
 */
class ApiService
{
	public static function alexa($domain)
	{
		$uri = 'http://data.alexa.com/data?cli=10&dat=snbamz&url=';
		$uri .= $domain;

		$xml = simplexml_load_file($uri);

		if (isset($xml->SD[1]->POPULARITY))
			return (int)$xml->SD[1]->POPULARITY->attributes()->TEXT;
	}

	public function get_google_pagerank($url)
	{
		$query = "http://toolbarqueries.google.com/tbr?client=navclient-auto&ch=" . $this->CheckHash($this->HashURL($url)) . "&features=Rank&q=info:" . $url . "&num=100&filter=0";
		$data = file_get_contents($query);
		$pos = strpos($data, "Rank_");
		if ($pos === false) {
		} else {
			$pagerank = substr($data, $pos + 9);
			return $pagerank;
		}
	}

	public function StrToNum($Str, $Check, $Magic)
	{
		$Int32Unit = 4294967296; // 2^32
		$length = strlen($Str);
		for ($i = 0; $i < $length; $i++) {
			$Check *= $Magic;
			if ($Check >= $Int32Unit) {
				$Check = ($Check - $Int32Unit * (int)($Check / $Int32Unit));
				$Check = ($Check < -2147483648) ? ($Check + $Int32Unit) : $Check;
			}
			$Check += ord($Str{$i});
		}
		return $Check;
	}

	public function HashURL($String)
	{
		$Check1 = $this->StrToNum($String, 0x1505, 0x21);
		$Check2 = $this->StrToNum($String, 0, 0x1003F);
		$Check1 >>= 2;
		$Check1 = (($Check1 >> 4) & 0x3FFFFC0) | ($Check1 & 0x3F);
		$Check1 = (($Check1 >> 4) & 0x3FFC00) | ($Check1 & 0x3FF);
		$Check1 = (($Check1 >> 4) & 0x3C000) | ($Check1 & 0x3FFF);
		$T1 = (((($Check1 & 0x3C0) << 4) | ($Check1 & 0x3C)) << 2) | ($Check2 & 0xF0F);
		$T2 = (((($Check1 & 0xFFFFC000) << 4) | ($Check1 & 0x3C00)) << 0xA) | ($Check2 & 0xF0F0000);
		return ($T1 | $T2);
	}

	public function CheckHash($Hashnum)
	{
		$CheckByte = 0;
		$Flag = 0;
		$HashStr = sprintf('%u', $Hashnum);
		$length = strlen($HashStr);
		for ($i = $length - 1; $i >= 0; $i--) {
			$Re = $HashStr{$i};
			if (1 === ($Flag % 2)) {
				$Re += $Re;
				$Re = (int)($Re / 10) + ($Re % 10);
			}
			$CheckByte += $Re;
			$Flag++;
		}
		$CheckByte %= 10;
		if (0 !== $CheckByte) {
			$CheckByte = 10 - $CheckByte;
			if (1 === ($Flag % 2)) {
				if (1 === ($CheckByte % 2)) {
					$CheckByte += 9;
				}
				$CheckByte >>= 1;
			}
		}
		return '7' . $CheckByte . $HashStr;
	}



	function find_whois_server($ext)
	{
		$WHOIS_SERVERS = Array(

			"com"  =>  "whois.crsnic.net",
			"net"  =>  "whois.crsnic.net",
			"org"  =>  "whois.pir.org",
			"edu"  =>  "whois.crsnic.net",
			"biz"  =>  "whois.neulevel.biz",
			"info" =>  "whois.afilias.info",
			"us"   =>  "whois.nic.us",
			"uk"   =>  "whois.nic.uk",
			"ca"   =>  "whois.cira.ca",
			"de"   =>  "whois.nic.de",
			"ws"   =>  "whois.nic.ws",
			"au"   =>  "whois.ausregistry.net.au",
			"nu"   =>  "whois.nic.nu",
			"in"   =>  "whois.registry.in",
			"tel"  =>  "whois.nic.tel",
			"ie"   =>  "whois.iedr.ie",
			"tw"   =>  "whois.twnic.net.tw",
			"tv"   =>  "whois.nic.tv",
			"ch"   =>  "whois.nic.ch",
			"eu"   =>  "whois.eu",
			"it"   =>  "whois.nic.it",
			"cn"   =>  "whois.cnnic.net.cn",
			"mobi" =>  "whois.dotmobiregistry.net",
			"cc"   =>  "whois.nic.cc",
			"asia" =>  "whois.nic.asia",
			"pro"  =>  "whois.registrypro.pro",
			"hk"   =>  "whois.hknic.net.hk",
			"me"   =>  "whois.meregistry.net",
			"be"   =>  "whois.dns.be",
			"se"   =>  "whois.nic.se",
			"ca"   =>  "whois.cira.ca",
			"nz"   =>  "whois.domainz.net.nz",
			"nl"   =>  "whois.sidn.nl",
			'ventures' => 'whois.donuts.co',
			'singles' => 'whois.donuts.co',
			'bike' => 'whois.donuts.co',
			'holdings' => 'whois.donuts.co',
			'plumbing' => 'whois.donuts.co',
			'guru' => 'whois.donuts.co',
			'clothing' => 'whois.donuts.co',
			'camera' => 'whois.donuts.co',
			'equipment' => 'whois.donuts.co',
			'estate' => 'whois.donuts.co',
			'gallery' => 'whois.donuts.co',
			'graphics' => 'whois.donuts.co',
			'lighting' => 'whois.donuts.co',
			'photography' => 'whois.donuts.co',
			'contractors' => 'whois.donuts.co',
			'land' => 'whois.donuts.co',
			'technology' => 'whois.donuts.co',
			'construction' => 'whois.donuts.co',
			'directory' => 'whois.donuts.co',
			'kitchen' => 'whois.donuts.co',
			'today' => 'whois.donuts.co',
			'diamonds' => 'whois.donuts.co',
			'enterprises' => 'whois.donuts.co',
			'tips' => 'whois.donuts.co',
			'voyage' => 'whois.donuts.co',
			'shoes' => 'whois.donuts.co',
			'careers' => 'whois.donuts.co',
			'photos' => 'whois.donuts.co',
			'recipes' => 'whois.donuts.co',
			'limo' => 'whois.donuts.co',
			'domains' => 'whois.donuts.co',
			'cab' => 'whois.donuts.co',
			'company' => 'whois.donuts.co',
			'computer' => 'whois.donuts.co',
			'center' => 'whois.donuts.co',
			'systems' => 'whois.donuts.co',
			'academy' => 'whois.donuts.co',
			'management' => 'whois.donuts.co',
			'training' => 'whois.donuts.co',
			'solutions' => 'whois.donuts.co',
			'support' => 'whois.donuts.co',
			'builders' => 'whois.donuts.co',
			'email' => 'whois.donuts.co',
			'education' => 'whois.donuts.co',
			'institute' => 'whois.donuts.co',
			'repair' => 'whois.donuts.co',
			'camp' => 'whois.donuts.co',
			'glass' => 'whois.donuts.co',
			'solar' => 'whois.donuts.co',
			'coffee' => 'whois.donuts.co',
			'international' => 'whois.donuts.co',
			'house' => 'whois.donuts.co',
			'florist' => 'whois.donuts.co',
			'holiday' => 'whois.donuts.co',
			'marketing' => 'whois.donuts.co',
			'viajes' => 'whois.donuts.co',
			'farm' => 'whois.donuts.co',
			'codes' => 'whois.donuts.co',
			'cheap' => 'whois.donuts.co',
			'zone' => 'whois.donuts.co',
			'agency' => 'whois.donuts.co',
			'bargains' => 'whois.donuts.co',
			'boutique' => 'whois.donuts.co',
			'tienda' => 'whois.donuts.co',
			'watch' => 'whois.donuts.co',
			'works' => 'whois.donuts.co',
			'cool' => 'whois.donuts.co',
			'expert' => 'whois.donuts.co',
			'menu' => 'whois.nic.menu',
			'club' => 'whois.nic.club',
			'photo' => 'whois.uniregistry.net',
			'gift' => 'whois.uniregistry.net',
			'guitars' => 'whois.uniregistry.net',
			'pics' => 'whois.uniregistry.net',
			'link' => 'whois.uniregistry.net',
			'sexy' => 'whois.uniregistry.net',
			'tattoo' => 'whois.uniregistry.net',
			'reviews' => 'whois.unitedtld.com',
			'ms' => 'whois.nic.ms',
			'uno' => 'whois.nic.uno',
			'buzz' => 'whois.nic.buzz',
			'berlin' => 'whois.nic.berlin'
		);
		$ext = strtolower($ext);
		if(array_key_exists($ext, $WHOIS_SERVERS))
			return $WHOIS_SERVERS[$ext];
		else return "";
	}

/////////////////////////////////////////////////////////////////////
	function do_whois($domainname, $server, $port=43)
	{
		$output = "Unable to connect to " . $server;
		if(($ns = fsockopen($server,$port)) == true)
		{
			$output = "";
			fputs($ns,"$domainname\r\n");
			while(!feof($ns))
				$output .= fgets($ns,128);
			fclose($ns);
		}
		return $output . "\r\n" . '<hr><p>Simple PHP WHOIS script, copyright (c) <a href="http://www.softnik.com/">Softnik Technologies</a></p>';
	}


	function get_registrar_server($string)
	{
		$lookfor = array("Registrar WHOIS Server:", "Whois Server:");
		foreach($lookfor as $fstr)
		{
			if(strstr($string, $fstr))
			{
				$string = str_ireplace($fstr, "", $string);
				return trim($string);
			}
		}
		return false;
	}

	function domain_whois($domainname, $port=43)
	{
		$domainname = trim($domainname);
		$domparts = explode(".", $domainname);
		$count = count($domparts);
		if(!$count)
			return "Invalid domain name";
		$server = $this->find_whois_server($domparts[$count-1]);
		if($server == "")
			return "Don't know the whois server for domain " . $domainname;
		$lookupname = $domainname;
		if(preg_match("/.(com|.net|.edu)$/i", $domainname))
			$lookupname = "domain " . $domainname;
		$output = $this->do_whois($lookupname, $server);
		if(preg_match("/.(com|.net|.edu|.cc|.tv|.ws)$/i", $domainname))
		{
			$pieces = explode("\n", $output);
			$count = count($pieces);
			$c = 0;
			for($c = 0; $c < $count; $c++)
			{
				$line = $pieces[$c];
				$registrar_server = $this->get_registrar_server($line);
				if($registrar_server !== false)
					$output = $this->do_whois($domainname, $registrar_server);
			}
		}
		if(!strlen($output))
			$output = "There was error connecting to the whois server [" . $server . "]";
		return $output;
	}

}

echo \App\Module\ApiService::alexa("asp.net");
$x = new \App\Module\ApiService();
echo '\n';
echo $x->get_google_pagerank("asp.net");
echo $x->domain_whois("insugg.com");