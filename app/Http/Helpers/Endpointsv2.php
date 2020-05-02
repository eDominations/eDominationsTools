<?php
namespace App\Http\Helpers;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

Class Endpointsv2
{

    protected $base_link;
    protected $api_endpoint;
    protected $result;
    protected $id;
    protected $endpoints_v2 = [
        0 => 'citizen',
        1 => 'battles',
        2 => 'travel',
        3 => 'battle-damage',
        4 => 'citizenship',
        5 => 'military-unit',
        6 => 'unit-members',
        7 => 'map',
        8 => 'resources',
        9 => 'milranks',
        10 => 'laws',
        11 => 'party',
        12 => 'newspaper',
        13 => 'articles',
        14 => 'article',
        15 => 'currency-market',
        16 => 'tax-income'
    ];


    /**
     * Endpointsv2 constructor.
     * @param $id
     */
    public function __construct($id)
    {

        $this->base_link = Config::get('settings')['eDominationsAPIv2'];
        $this->id = $id;

    }

    /**
     * @return mixed
     */
    public function getCitizen(){

        $this->setLink(0);
        $this->getApiResults();
        return $this->result;

    }

    public function getBattles(){

        $this->setLink(1);
        $this->getApiResults();
        return $this->result;

    }

    public function getTravel(){

        $this->setLink(2);
        $this->getApiResults();
        return $this->result;

    }

    public function getBattleDamage(){

        $this->setLink(3);
        $this->getApiResults();
        return $this->result;

    }
    public function getCitizenship(){

        $this->setLink(4);
        $this->getApiResults();
        return $this->result;

    }
    public function getMilitaryUnit(){

        $this->setLink(5);
        $this->getApiResults();
        return $this->result;

    }

    public function getUnitMembers(){

        $this->setLink(6);
        $this->getApiResults();
        return $this->result;

    }
    public function getMap(){

        $this->setLink(7);
        $this->getApiResults();
        return $this->result;

    }
    public function getResources(){

        $this->setLink(8);
        $this->getApiResults();
        return $this->result;

    }
    public function getMilitaryRank(){

        $this->setLink(9);
        $this->getApiResults();
        return $this->result;

    }

    public function getLaw(){

        $this->setLink(10);
        $this->getApiResults();
        return $this->result;

    }

    public function getParty(){

        $this->setLink(11);
        $this->getApiResults();
        return $this->result;

    }

    public function getNewsPaper(){

        $this->setLink(12);
        $this->getApiResults();
        return $this->result;

    }

    public function getArticlesOfNewsPaper(){

        $this->setLink(13);
        $this->getApiResults();
        return $this->result;

    }

    public function getArticle(){

        $this->setLink(14);
        $this->getApiResults();
        return $this->result;

    }

    public function getCurrency(){

        $this->setLink(15);
        $this->getApiResults();
        return $this->result;

    }

    public function getTax(){

        $this->setLink(16);
        $this->getApiResults();
        return $this->result;

    }

    /**
     * @return null
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function getApiResults(){

        $data = new Client();
        $res = $data->request('get', $this->api_endpoint);
        if($res->getStatusCode() != 200){
            return $this->result = null;
        }
        $this->result = json_decode($res->getBody()->getContents(),true);

    }

    /**
     * @param $section
     */
    protected function setLink($section){

         $this->api_endpoint = $this->base_link.'/'.$this->endpoints_v2[$section].'/'.$this->id;

    }


}
