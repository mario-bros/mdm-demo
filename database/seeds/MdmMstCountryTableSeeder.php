<?php

use Illuminate\Database\Seeder;

class MdmMstCountryTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mdm_mst_country')->delete();
        
        \DB::table('mdm_mst_country')->insert(array (
            0 => 
            array (
                'country' => 'COTE DIVOIRE',
                'code_2' => 'CI',
                'code_3' => 'CIV',
                'code_number' => '384',
            ),
            1 => 
            array (
                'country' => 'AFGHANISTAN',
                'code_2' => 'AF',
                'code_3' => 'AFG',
                'code_number' => '4',
            ),
            2 => 
            array (
                'country' => 'ALAND ISLANDS',
                'code_2' => 'AX',
                'code_3' => 'ALA',
                'code_number' => '248',
            ),
            3 => 
            array (
                'country' => 'ALBANIA',
                'code_2' => 'AL',
                'code_3' => 'ALB',
                'code_number' => '8',
            ),
            4 => 
            array (
                'country' => 'ALGERIA',
                'code_2' => 'DZ',
                'code_3' => 'DZA',
                'code_number' => '12',
            ),
            5 => 
            array (
                'country' => 'AMERICAN SAMOA',
                'code_2' => 'AS',
                'code_3' => 'ASM',
                'code_number' => '16',
            ),
            6 => 
            array (
                'country' => 'ANDORRA',
                'code_2' => 'AD',
                'code_3' => 'AND',
                'code_number' => '20',
            ),
            7 => 
            array (
                'country' => 'ANGOLA',
                'code_2' => 'AO',
                'code_3' => 'AGO',
                'code_number' => '24',
            ),
            8 => 
            array (
                'country' => 'ANGUILLA',
                'code_2' => 'AI',
                'code_3' => 'AIA',
                'code_number' => '660',
            ),
            9 => 
            array (
                'country' => 'ANTARCTICA',
                'code_2' => 'AQ',
                'code_3' => 'ATA',
                'code_number' => '10',
            ),
            10 => 
            array (
                'country' => 'ANTIGUA AND BARBUDA',
                'code_2' => 'AG',
                'code_3' => 'ATG',
                'code_number' => '28',
            ),
            11 => 
            array (
                'country' => 'ARGENTINA',
                'code_2' => 'AR',
                'code_3' => 'ARG',
                'code_number' => '32',
            ),
            12 => 
            array (
                'country' => 'ARMENIA',
                'code_2' => 'AM',
                'code_3' => 'ARM',
                'code_number' => '51',
            ),
            13 => 
            array (
                'country' => 'ARUBA',
                'code_2' => 'AW',
                'code_3' => 'ABW',
                'code_number' => '533',
            ),
            14 => 
            array (
                'country' => 'AUSTRALIA',
                'code_2' => 'AU',
                'code_3' => 'AUS',
                'code_number' => '36',
            ),
            15 => 
            array (
                'country' => 'AUSTRIA',
                'code_2' => 'AT',
                'code_3' => 'AUT',
                'code_number' => '40',
            ),
            16 => 
            array (
                'country' => 'AZERBAIJAN',
                'code_2' => 'AZ',
                'code_3' => 'AZE',
                'code_number' => '31',
            ),
            17 => 
            array (
                'country' => 'BAHAMAS',
                'code_2' => 'BS',
                'code_3' => 'BHS',
                'code_number' => '44',
            ),
            18 => 
            array (
                'country' => 'BAHRAIN',
                'code_2' => 'BH',
                'code_3' => 'BHR',
                'code_number' => '48',
            ),
            19 => 
            array (
                'country' => 'BANGLADESH',
                'code_2' => 'BD',
                'code_3' => 'BGD',
                'code_number' => '50',
            ),
            20 => 
            array (
                'country' => 'BARBADOS',
                'code_2' => 'BB',
                'code_3' => 'BRB',
                'code_number' => '52',
            ),
            21 => 
            array (
                'country' => 'BELARUS',
                'code_2' => 'BY',
                'code_3' => 'BLR',
                'code_number' => '112',
            ),
            22 => 
            array (
                'country' => 'BELGIUM',
                'code_2' => 'BE',
                'code_3' => 'BEL',
                'code_number' => '56',
            ),
            23 => 
            array (
                'country' => 'BELIZE',
                'code_2' => 'BZ',
                'code_3' => 'BLZ',
                'code_number' => '84',
            ),
            24 => 
            array (
                'country' => 'BENIN',
                'code_2' => 'BJ',
                'code_3' => 'BEN',
                'code_number' => '204',
            ),
            25 => 
            array (
                'country' => 'BERMUDA',
                'code_2' => 'BM',
                'code_3' => 'BMU',
                'code_number' => '60',
            ),
            26 => 
            array (
                'country' => 'BHUTAN',
                'code_2' => 'BT',
                'code_3' => 'BTN',
                'code_number' => '64',
            ),
            27 => 
            array (
                'country' => 'BOLIVIA',
                'code_2' => 'BO',
                'code_3' => 'BOL',
                'code_number' => '68',
            ),
            28 => 
            array (
                'country' => 'BOSNIA AND HERZEGOVINA',
                'code_2' => 'BA',
                'code_3' => 'BIH',
                'code_number' => '70',
            ),
            29 => 
            array (
                'country' => 'BOTSWANA',
                'code_2' => 'BW',
                'code_3' => 'BWA',
                'code_number' => '72',
            ),
            30 => 
            array (
                'country' => 'BOUVET ISLAND',
                'code_2' => 'BV',
                'code_3' => 'BVT',
                'code_number' => '74',
            ),
            31 => 
            array (
                'country' => 'BRAZIL',
                'code_2' => 'BR',
                'code_3' => 'BRA',
                'code_number' => '76',
            ),
            32 => 
            array (
                'country' => 'BRITISH VIRGIN ISLANDS',
                'code_2' => 'VG',
                'code_3' => 'VGB',
                'code_number' => '92',
            ),
            33 => 
            array (
                'country' => 'BRITISH INDIAN OCEAN TERRITORY',
                'code_2' => 'IO',
                'code_3' => 'IOT',
                'code_number' => '86',
            ),
            34 => 
            array (
                'country' => 'BRUNEI DARUSSALAM',
                'code_2' => 'BN',
                'code_3' => 'BRN',
                'code_number' => '96',
            ),
            35 => 
            array (
                'country' => 'BULGARIA',
                'code_2' => 'BG',
                'code_3' => 'BGR',
                'code_number' => '100',
            ),
            36 => 
            array (
                'country' => 'BURKINA FASO',
                'code_2' => 'BF',
                'code_3' => 'BFA',
                'code_number' => '854',
            ),
            37 => 
            array (
                'country' => 'BURUNDI',
                'code_2' => 'BI',
                'code_3' => 'BDI',
                'code_number' => '108',
            ),
            38 => 
            array (
                'country' => 'CAMBODIA',
                'code_2' => 'KH',
                'code_3' => 'KHM',
                'code_number' => '116',
            ),
            39 => 
            array (
                'country' => 'CAMEROON',
                'code_2' => 'CM',
                'code_3' => 'CMR',
                'code_number' => '120',
            ),
            40 => 
            array (
                'country' => 'CANADA',
                'code_2' => 'CA',
                'code_3' => 'CAN',
                'code_number' => '124',
            ),
            41 => 
            array (
                'country' => 'CAPE VERDE',
                'code_2' => 'CV',
                'code_3' => 'CPV',
                'code_number' => '132',
            ),
            42 => 
            array (
                'country' => 'CAYMAN ISLANDS',
                'code_2' => 'KY',
                'code_3' => 'CYM',
                'code_number' => '136',
            ),
            43 => 
            array (
                'country' => 'CENTRAL AFRICAN REPUBLIC',
                'code_2' => 'CF',
                'code_3' => 'CAF',
                'code_number' => '140',
            ),
            44 => 
            array (
                'country' => 'CHAD',
                'code_2' => 'TD',
                'code_3' => 'TCD',
                'code_number' => '148',
            ),
            45 => 
            array (
                'country' => 'CHILE',
                'code_2' => 'CL',
                'code_3' => 'CHL',
                'code_number' => '152',
            ),
            46 => 
            array (
                'country' => 'CHINA',
                'code_2' => 'CN',
                'code_3' => 'CHN',
                'code_number' => '156',
            ),
            47 => 
            array (
                'country' => 'HONG KONG, SAR CHINA',
                'code_2' => 'HK',
                'code_3' => 'HKG',
                'code_number' => '344',
            ),
            48 => 
            array (
                'country' => 'MACAO, SAR CHINA',
                'code_2' => 'MO',
                'code_3' => 'MAC',
                'code_number' => '446',
            ),
            49 => 
            array (
                'country' => 'CHRISTMAS ISLAND',
                'code_2' => 'CX',
                'code_3' => 'CXR',
                'code_number' => '162',
            ),
            50 => 
            array (
            'country' => 'COCOS (KEELING) ISLANDS',
                'code_2' => 'CC',
                'code_3' => 'CCK',
                'code_number' => '166',
            ),
            51 => 
            array (
                'country' => 'COLOMBIA',
                'code_2' => 'CO',
                'code_3' => 'COL',
                'code_number' => '170',
            ),
            52 => 
            array (
                'country' => 'COMOROS',
                'code_2' => 'KM',
                'code_3' => 'COM',
                'code_number' => '174',
            ),
            53 => 
            array (
            'country' => 'CONGO (BRAZZAVILLE)',
                'code_2' => 'CG',
                'code_3' => 'COG',
                'code_number' => '178',
            ),
            54 => 
            array (
            'country' => 'CONGO, (KINSHASA)',
                'code_2' => 'CD',
                'code_3' => 'COD',
                'code_number' => '180',
            ),
            55 => 
            array (
                'country' => 'COOK ISLANDS',
                'code_2' => 'CK',
                'code_3' => 'COK',
                'code_number' => '184',
            ),
            56 => 
            array (
                'country' => 'COSTA RICA',
                'code_2' => 'CR',
                'code_3' => 'CRI',
                'code_number' => '188',
            ),
            57 => 
            array (
                'country' => 'CROATIA',
                'code_2' => 'HR',
                'code_3' => 'HRV',
                'code_number' => '191',
            ),
            58 => 
            array (
                'country' => 'CUBA',
                'code_2' => 'CU',
                'code_3' => 'CUB',
                'code_number' => '192',
            ),
            59 => 
            array (
                'country' => 'CYPRUS',
                'code_2' => 'CY',
                'code_3' => 'CYP',
                'code_number' => '196',
            ),
            60 => 
            array (
                'country' => 'CZECH REPUBLIC',
                'code_2' => 'CZ',
                'code_3' => 'CZE',
                'code_number' => '203',
            ),
            61 => 
            array (
                'country' => 'DENMARK',
                'code_2' => 'DK',
                'code_3' => 'DNK',
                'code_number' => '208',
            ),
            62 => 
            array (
                'country' => 'DJIBOUTI',
                'code_2' => 'DJ',
                'code_3' => 'DJI',
                'code_number' => '262',
            ),
            63 => 
            array (
                'country' => 'DOMINICA',
                'code_2' => 'DM',
                'code_3' => 'DMA',
                'code_number' => '212',
            ),
            64 => 
            array (
                'country' => 'DOMINICAN REPUBLIC',
                'code_2' => 'DO',
                'code_3' => 'DOM',
                'code_number' => '214',
            ),
            65 => 
            array (
                'country' => 'ECUADOR',
                'code_2' => 'EC',
                'code_3' => 'ECU',
                'code_number' => '218',
            ),
            66 => 
            array (
                'country' => 'EGYPT',
                'code_2' => 'EG',
                'code_3' => 'EGY',
                'code_number' => '818',
            ),
            67 => 
            array (
                'country' => 'EL SALVADOR',
                'code_2' => 'SV',
                'code_3' => 'SLV',
                'code_number' => '222',
            ),
            68 => 
            array (
                'country' => 'EQUATORIAL GUINEA',
                'code_2' => 'GQ',
                'code_3' => 'GNQ',
                'code_number' => '226',
            ),
            69 => 
            array (
                'country' => 'ERITREA',
                'code_2' => 'ER',
                'code_3' => 'ERI',
                'code_number' => '232',
            ),
            70 => 
            array (
                'country' => 'ESTONIA',
                'code_2' => 'EE',
                'code_3' => 'EST',
                'code_number' => '233',
            ),
            71 => 
            array (
                'country' => 'ETHIOPIA',
                'code_2' => 'ET',
                'code_3' => 'ETH',
                'code_number' => '231',
            ),
            72 => 
            array (
            'country' => 'FALKLAND ISLANDS (MALVINAS)',
                'code_2' => 'FK',
                'code_3' => 'FLK',
                'code_number' => '238',
            ),
            73 => 
            array (
                'country' => 'FAROE ISLANDS',
                'code_2' => 'FO',
                'code_3' => 'FRO',
                'code_number' => '234',
            ),
            74 => 
            array (
                'country' => 'FIJI',
                'code_2' => 'FJ',
                'code_3' => 'FJI',
                'code_number' => '242',
            ),
            75 => 
            array (
                'country' => 'FINLAND',
                'code_2' => 'FI',
                'code_3' => 'FIN',
                'code_number' => '246',
            ),
            76 => 
            array (
                'country' => 'FRANCE',
                'code_2' => 'FR',
                'code_3' => 'FRA',
                'code_number' => '250',
            ),
            77 => 
            array (
                'country' => 'FRENCH GUIANA',
                'code_2' => 'GF',
                'code_3' => 'GUF',
                'code_number' => '254',
            ),
            78 => 
            array (
                'country' => 'FRENCH POLYNESIA',
                'code_2' => 'PF',
                'code_3' => 'PYF',
                'code_number' => '258',
            ),
            79 => 
            array (
                'country' => 'FRENCH SOUTHERN TERRITORIES',
                'code_2' => 'TF',
                'code_3' => 'ATF',
                'code_number' => '260',
            ),
            80 => 
            array (
                'country' => 'GABON',
                'code_2' => 'GA',
                'code_3' => 'GAB',
                'code_number' => '266',
            ),
            81 => 
            array (
                'country' => 'GAMBIA',
                'code_2' => 'GM',
                'code_3' => 'GMB',
                'code_number' => '270',
            ),
            82 => 
            array (
                'country' => 'GEORGIA',
                'code_2' => 'GE',
                'code_3' => 'GEO',
                'code_number' => '268',
            ),
            83 => 
            array (
                'country' => 'GERMANY',
                'code_2' => 'DE',
                'code_3' => 'DEU',
                'code_number' => '276',
            ),
            84 => 
            array (
                'country' => 'GHANA',
                'code_2' => 'GH',
                'code_3' => 'GHA',
                'code_number' => '288',
            ),
            85 => 
            array (
                'country' => 'GIBRALTAR',
                'code_2' => 'GI',
                'code_3' => 'GIB',
                'code_number' => '292',
            ),
            86 => 
            array (
                'country' => 'GREECE',
                'code_2' => 'GR',
                'code_3' => 'GRC',
                'code_number' => '300',
            ),
            87 => 
            array (
                'country' => 'GREENLAND',
                'code_2' => 'GL',
                'code_3' => 'GRL',
                'code_number' => '304',
            ),
            88 => 
            array (
                'country' => 'GRENADA',
                'code_2' => 'GD',
                'code_3' => 'GRD',
                'code_number' => '308',
            ),
            89 => 
            array (
                'country' => 'GUADELOUPE',
                'code_2' => 'GP',
                'code_3' => 'GLP',
                'code_number' => '312',
            ),
            90 => 
            array (
                'country' => 'GUAM',
                'code_2' => 'GU',
                'code_3' => 'GUM',
                'code_number' => '316',
            ),
            91 => 
            array (
                'country' => 'GUATEMALA',
                'code_2' => 'GT',
                'code_3' => 'GTM',
                'code_number' => '320',
            ),
            92 => 
            array (
                'country' => 'GUERNSEY',
                'code_2' => 'GG',
                'code_3' => 'GGY',
                'code_number' => '831',
            ),
            93 => 
            array (
                'country' => 'GUINEA',
                'code_2' => 'GN',
                'code_3' => 'GIN',
                'code_number' => '324',
            ),
            94 => 
            array (
                'country' => 'GUINEA-BISSAU',
                'code_2' => 'GW',
                'code_3' => 'GNB',
                'code_number' => '624',
            ),
            95 => 
            array (
                'country' => 'GUYANA',
                'code_2' => 'GY',
                'code_3' => 'GUY',
                'code_number' => '328',
            ),
            96 => 
            array (
                'country' => 'HAITI',
                'code_2' => 'HT',
                'code_3' => 'HTI',
                'code_number' => '332',
            ),
            97 => 
            array (
                'country' => 'HEARD AND MCDONALD ISLANDS',
                'code_2' => 'HM',
                'code_3' => 'HMD',
                'code_number' => '334',
            ),
            98 => 
            array (
            'country' => 'HOLY SEE (VATICAN CITY STATE)',
                'code_2' => 'VA',
                'code_3' => 'VAT',
                'code_number' => '336',
            ),
            99 => 
            array (
                'country' => 'HONDURAS',
                'code_2' => 'HN',
                'code_3' => 'HND',
                'code_number' => '340',
            ),
            100 => 
            array (
                'country' => 'HUNGARY',
                'code_2' => 'HU',
                'code_3' => 'HUN',
                'code_number' => '348',
            ),
            101 => 
            array (
                'country' => 'ICELAND',
                'code_2' => 'IS',
                'code_3' => 'ISL',
                'code_number' => '352',
            ),
            102 => 
            array (
                'country' => 'INDIA',
                'code_2' => 'IN',
                'code_3' => 'IND',
                'code_number' => '356',
            ),
            103 => 
            array (
                'country' => 'INDONESIA',
                'code_2' => 'ID',
                'code_3' => 'IDN',
                'code_number' => '360',
            ),
            104 => 
            array (
                'country' => 'IRAN, ISLAMIC REPUBLIC OF',
                'code_2' => 'IR',
                'code_3' => 'IRN',
                'code_number' => '364',
            ),
            105 => 
            array (
                'country' => 'IRAQ',
                'code_2' => 'IQ',
                'code_3' => 'IRQ',
                'code_number' => '368',
            ),
            106 => 
            array (
                'country' => 'IRELAND',
                'code_2' => 'IE',
                'code_3' => 'IRL',
                'code_number' => '372',
            ),
            107 => 
            array (
                'country' => 'ISLE OF MAN',
                'code_2' => 'IM',
                'code_3' => 'IMN',
                'code_number' => '833',
            ),
            108 => 
            array (
                'country' => 'ISRAEL',
                'code_2' => 'IL',
                'code_3' => 'ISR',
                'code_number' => '376',
            ),
            109 => 
            array (
                'country' => 'ITALY',
                'code_2' => 'IT',
                'code_3' => 'ITA',
                'code_number' => '380',
            ),
            110 => 
            array (
                'country' => 'JAMAICA',
                'code_2' => 'JM',
                'code_3' => 'JAM',
                'code_number' => '388',
            ),
            111 => 
            array (
                'country' => 'JAPAN',
                'code_2' => 'JP',
                'code_3' => 'JPN',
                'code_number' => '392',
            ),
            112 => 
            array (
                'country' => 'JERSEY',
                'code_2' => 'JE',
                'code_3' => 'JEY',
                'code_number' => '832',
            ),
            113 => 
            array (
                'country' => 'JORDAN',
                'code_2' => 'JO',
                'code_3' => 'JOR',
                'code_number' => '400',
            ),
            114 => 
            array (
                'country' => 'KAZAKHSTAN',
                'code_2' => 'KZ',
                'code_3' => 'KAZ',
                'code_number' => '398',
            ),
            115 => 
            array (
                'country' => 'KENYA',
                'code_2' => 'KE',
                'code_3' => 'KEN',
                'code_number' => '404',
            ),
            116 => 
            array (
                'country' => 'KIRIBATI',
                'code_2' => 'KI',
                'code_3' => 'KIR',
                'code_number' => '296',
            ),
            117 => 
            array (
            'country' => 'KOREA (NORTH)',
                'code_2' => 'KP',
                'code_3' => 'PRK',
                'code_number' => '408',
            ),
            118 => 
            array (
            'country' => 'KOREA (SOUTH)',
                'code_2' => 'KR',
                'code_3' => 'KOR',
                'code_number' => '410',
            ),
            119 => 
            array (
                'country' => 'KUWAIT',
                'code_2' => 'KW',
                'code_3' => 'KWT',
                'code_number' => '414',
            ),
            120 => 
            array (
                'country' => 'KYRGYZSTAN',
                'code_2' => 'KG',
                'code_3' => 'KGZ',
                'code_number' => '417',
            ),
            121 => 
            array (
                'country' => 'LAO PDR',
                'code_2' => 'LA',
                'code_3' => 'LAO',
                'code_number' => '418',
            ),
            122 => 
            array (
                'country' => 'LATVIA',
                'code_2' => 'LV',
                'code_3' => 'LVA',
                'code_number' => '428',
            ),
            123 => 
            array (
                'country' => 'LEBANON',
                'code_2' => 'LB',
                'code_3' => 'LBN',
                'code_number' => '422',
            ),
            124 => 
            array (
                'country' => 'LESOTHO',
                'code_2' => 'LS',
                'code_3' => 'LSO',
                'code_number' => '426',
            ),
            125 => 
            array (
                'country' => 'LIBERIA',
                'code_2' => 'LR',
                'code_3' => 'LBR',
                'code_number' => '430',
            ),
            126 => 
            array (
                'country' => 'LIBYA',
                'code_2' => 'LY',
                'code_3' => 'LBY',
                'code_number' => '434',
            ),
            127 => 
            array (
                'country' => 'LIECHTENSTEIN',
                'code_2' => 'LI',
                'code_3' => 'LIE',
                'code_number' => '438',
            ),
            128 => 
            array (
                'country' => 'LITHUANIA',
                'code_2' => 'LT',
                'code_3' => 'LTU',
                'code_number' => '440',
            ),
            129 => 
            array (
                'country' => 'LUXEMBOURG',
                'code_2' => 'LU',
                'code_3' => 'LUX',
                'code_number' => '442',
            ),
            130 => 
            array (
                'country' => 'MACEDONIA, REPUBLIC OF',
                'code_2' => 'MK',
                'code_3' => 'MKD',
                'code_number' => '807',
            ),
            131 => 
            array (
                'country' => 'MADAGASCAR',
                'code_2' => 'MG',
                'code_3' => 'MDG',
                'code_number' => '450',
            ),
            132 => 
            array (
                'country' => 'MALAWI',
                'code_2' => 'MW',
                'code_3' => 'MWI',
                'code_number' => '454',
            ),
            133 => 
            array (
                'country' => 'MALAYSIA',
                'code_2' => 'MY',
                'code_3' => 'MYS',
                'code_number' => '458',
            ),
            134 => 
            array (
                'country' => 'MALDIVES',
                'code_2' => 'MV',
                'code_3' => 'MDV',
                'code_number' => '462',
            ),
            135 => 
            array (
                'country' => 'MALI',
                'code_2' => 'ML',
                'code_3' => 'MLI',
                'code_number' => '466',
            ),
            136 => 
            array (
                'country' => 'MALTA',
                'code_2' => 'MT',
                'code_3' => 'MLT',
                'code_number' => '470',
            ),
            137 => 
            array (
                'country' => 'MARSHALL ISLANDS',
                'code_2' => 'MH',
                'code_3' => 'MHL',
                'code_number' => '584',
            ),
            138 => 
            array (
                'country' => 'MARTINIQUE',
                'code_2' => 'MQ',
                'code_3' => 'MTQ',
                'code_number' => '474',
            ),
            139 => 
            array (
                'country' => 'MAURITANIA',
                'code_2' => 'MR',
                'code_3' => 'MRT',
                'code_number' => '478',
            ),
            140 => 
            array (
                'country' => 'MAURITIUS',
                'code_2' => 'MU',
                'code_3' => 'MUS',
                'code_number' => '480',
            ),
            141 => 
            array (
                'country' => 'MAYOTTE',
                'code_2' => 'YT',
                'code_3' => 'MYT',
                'code_number' => '175',
            ),
            142 => 
            array (
                'country' => 'MEXICO',
                'code_2' => 'MX',
                'code_3' => 'MEX',
                'code_number' => '484',
            ),
            143 => 
            array (
                'country' => 'MICRONESIA, FEDERATED STATES OF',
                'code_2' => 'FM',
                'code_3' => 'FSM',
                'code_number' => '583',
            ),
            144 => 
            array (
                'country' => 'MOLDOVA',
                'code_2' => 'MD',
                'code_3' => 'MDA',
                'code_number' => '498',
            ),
            145 => 
            array (
                'country' => 'MONACO',
                'code_2' => 'MC',
                'code_3' => 'MCO',
                'code_number' => '492',
            ),
            146 => 
            array (
                'country' => 'MONGOLIA',
                'code_2' => 'MN',
                'code_3' => 'MNG',
                'code_number' => '496',
            ),
            147 => 
            array (
                'country' => 'MONTENEGRO',
                'code_2' => 'ME',
                'code_3' => 'MNE',
                'code_number' => '499',
            ),
            148 => 
            array (
                'country' => 'MONTSERRAT',
                'code_2' => 'MS',
                'code_3' => 'MSR',
                'code_number' => '500',
            ),
            149 => 
            array (
                'country' => 'MOROCCO',
                'code_2' => 'MA',
                'code_3' => 'MAR',
                'code_number' => '504',
            ),
            150 => 
            array (
                'country' => 'MOZAMBIQUE',
                'code_2' => 'MZ',
                'code_3' => 'MOZ',
                'code_number' => '508',
            ),
            151 => 
            array (
                'country' => 'MYANMAR',
                'code_2' => 'MM',
                'code_3' => 'MMR',
                'code_number' => '104',
            ),
            152 => 
            array (
                'country' => 'NAMIBIA',
                'code_2' => 'NA',
                'code_3' => 'NAM',
                'code_number' => '516',
            ),
            153 => 
            array (
                'country' => 'NAURU',
                'code_2' => 'NR',
                'code_3' => 'NRU',
                'code_number' => '520',
            ),
            154 => 
            array (
                'country' => 'NEPAL',
                'code_2' => 'NP',
                'code_3' => 'NPL',
                'code_number' => '524',
            ),
            155 => 
            array (
                'country' => 'NETHERLANDS',
                'code_2' => 'NL',
                'code_3' => 'NLD',
                'code_number' => '528',
            ),
            156 => 
            array (
                'country' => 'NETHERLANDS ANTILLES',
                'code_2' => 'AN',
                'code_3' => 'ANT',
                'code_number' => '530',
            ),
            157 => 
            array (
                'country' => 'NEW CALEDONIA',
                'code_2' => 'NC',
                'code_3' => 'NCL',
                'code_number' => '540',
            ),
            158 => 
            array (
                'country' => 'NEW ZEALAND',
                'code_2' => 'NZ',
                'code_3' => 'NZL',
                'code_number' => '554',
            ),
            159 => 
            array (
                'country' => 'NICARAGUA',
                'code_2' => 'NI',
                'code_3' => 'NIC',
                'code_number' => '558',
            ),
            160 => 
            array (
                'country' => 'NIGER',
                'code_2' => 'NE',
                'code_3' => 'NER',
                'code_number' => '562',
            ),
            161 => 
            array (
                'country' => 'NIGERIA',
                'code_2' => 'NG',
                'code_3' => 'NGA',
                'code_number' => '566',
            ),
            162 => 
            array (
                'country' => 'NIUE',
                'code_2' => 'NU',
                'code_3' => 'NIU',
                'code_number' => '570',
            ),
            163 => 
            array (
                'country' => 'NORFOLK ISLAND',
                'code_2' => 'NF',
                'code_3' => 'NFK',
                'code_number' => '574',
            ),
            164 => 
            array (
                'country' => 'NORTHERN MARIANA ISLANDS',
                'code_2' => 'MP',
                'code_3' => 'MNP',
                'code_number' => '580',
            ),
            165 => 
            array (
                'country' => 'NORWAY',
                'code_2' => 'NO',
                'code_3' => 'NOR',
                'code_number' => '578',
            ),
            166 => 
            array (
                'country' => 'OMAN',
                'code_2' => 'OM',
                'code_3' => 'OMN',
                'code_number' => '512',
            ),
            167 => 
            array (
                'country' => 'PAKISTAN',
                'code_2' => 'PK',
                'code_3' => 'PAK',
                'code_number' => '586',
            ),
            168 => 
            array (
                'country' => 'PALAU',
                'code_2' => 'PW',
                'code_3' => 'PLW',
                'code_number' => '585',
            ),
            169 => 
            array (
                'country' => 'PALESTINIAN TERRITORY',
                'code_2' => 'PS',
                'code_3' => 'PSE',
                'code_number' => '275',
            ),
            170 => 
            array (
                'country' => 'PANAMA',
                'code_2' => 'PA',
                'code_3' => 'PAN',
                'code_number' => '591',
            ),
            171 => 
            array (
                'country' => 'PAPUA NEW GUINEA',
                'code_2' => 'PG',
                'code_3' => 'PNG',
                'code_number' => '598',
            ),
            172 => 
            array (
                'country' => 'PARAGUAY',
                'code_2' => 'PY',
                'code_3' => 'PRY',
                'code_number' => '600',
            ),
            173 => 
            array (
                'country' => 'PERU',
                'code_2' => 'PE',
                'code_3' => 'PER',
                'code_number' => '604',
            ),
            174 => 
            array (
                'country' => 'PHILIPPINES',
                'code_2' => 'PH',
                'code_3' => 'PHL',
                'code_number' => '608',
            ),
            175 => 
            array (
                'country' => 'PITCAIRN',
                'code_2' => 'PN',
                'code_3' => 'PCN',
                'code_number' => '612',
            ),
            176 => 
            array (
                'country' => 'POLAND',
                'code_2' => 'PL',
                'code_3' => 'POL',
                'code_number' => '616',
            ),
            177 => 
            array (
                'country' => 'PORTUGAL',
                'code_2' => 'PT',
                'code_3' => 'PRT',
                'code_number' => '620',
            ),
            178 => 
            array (
                'country' => 'PUERTO RICO',
                'code_2' => 'PR',
                'code_3' => 'PRI',
                'code_number' => '630',
            ),
            179 => 
            array (
                'country' => 'QATAR',
                'code_2' => 'QA',
                'code_3' => 'QAT',
                'code_number' => '634',
            ),
            180 => 
            array (
                'country' => 'RÉUNION',
                'code_2' => 'RE',
                'code_3' => 'REU',
                'code_number' => '638',
            ),
            181 => 
            array (
                'country' => 'ROMANIA',
                'code_2' => 'RO',
                'code_3' => 'ROU',
                'code_number' => '642',
            ),
            182 => 
            array (
                'country' => 'RUSSIAN FEDERATION',
                'code_2' => 'RU',
                'code_3' => 'RUS',
                'code_number' => '643',
            ),
            183 => 
            array (
                'country' => 'RWANDA',
                'code_2' => 'RW',
                'code_3' => 'RWA',
                'code_number' => '646',
            ),
            184 => 
            array (
                'country' => 'SAINT-BARTHÉLEMY',
                'code_2' => 'BL',
                'code_3' => 'BLM',
                'code_number' => '652',
            ),
            185 => 
            array (
                'country' => 'SAINT HELENA',
                'code_2' => 'SH',
                'code_3' => 'SHN',
                'code_number' => '654',
            ),
            186 => 
            array (
                'country' => 'SAINT KITTS AND NEVIS',
                'code_2' => 'KN',
                'code_3' => 'KNA',
                'code_number' => '659',
            ),
            187 => 
            array (
                'country' => 'SAINT LUCIA',
                'code_2' => 'LC',
                'code_3' => 'LCA',
                'code_number' => '662',
            ),
            188 => 
            array (
            'country' => 'SAINT-MARTIN (FRENCH PART)',
                'code_2' => 'MF',
                'code_3' => 'MAF',
                'code_number' => '663',
            ),
            189 => 
            array (
                'country' => 'SAINT PIERRE AND MIQUELON',
                'code_2' => 'PM',
                'code_3' => 'SPM',
                'code_number' => '666',
            ),
            190 => 
            array (
                'country' => 'SAINT VINCENT AND GRENADINES',
                'code_2' => 'VC',
                'code_3' => 'VCT',
                'code_number' => '670',
            ),
            191 => 
            array (
                'country' => 'SAMOA',
                'code_2' => 'WS',
                'code_3' => 'WSM',
                'code_number' => '882',
            ),
            192 => 
            array (
                'country' => 'SAN MARINO',
                'code_2' => 'SM',
                'code_3' => 'SMR',
                'code_number' => '674',
            ),
            193 => 
            array (
                'country' => 'SAO TOME AND PRINCIPE',
                'code_2' => 'ST',
                'code_3' => 'STP',
                'code_number' => '678',
            ),
            194 => 
            array (
                'country' => 'SAUDI ARABIA',
                'code_2' => 'SA',
                'code_3' => 'SAU',
                'code_number' => '682',
            ),
            195 => 
            array (
                'country' => 'SENEGAL',
                'code_2' => 'SN',
                'code_3' => 'SEN',
                'code_number' => '686',
            ),
            196 => 
            array (
                'country' => 'SERBIA',
                'code_2' => 'RS',
                'code_3' => 'SRB',
                'code_number' => '688',
            ),
            197 => 
            array (
                'country' => 'SEYCHELLES',
                'code_2' => 'SC',
                'code_3' => 'SYC',
                'code_number' => '690',
            ),
            198 => 
            array (
                'country' => 'SIERRA LEONE',
                'code_2' => 'SL',
                'code_3' => 'SLE',
                'code_number' => '694',
            ),
            199 => 
            array (
                'country' => 'SINGAPORE',
                'code_2' => 'SG',
                'code_3' => 'SGP',
                'code_number' => '702',
            ),
            200 => 
            array (
                'country' => 'SLOVAKIA',
                'code_2' => 'SK',
                'code_3' => 'SVK',
                'code_number' => '703',
            ),
            201 => 
            array (
                'country' => 'SLOVENIA',
                'code_2' => 'SI',
                'code_3' => 'SVN',
                'code_number' => '705',
            ),
            202 => 
            array (
                'country' => 'SOLOMON ISLANDS',
                'code_2' => 'SB',
                'code_3' => 'SLB',
                'code_number' => '90',
            ),
            203 => 
            array (
                'country' => 'SOMALIA',
                'code_2' => 'SO',
                'code_3' => 'SOM',
                'code_number' => '706',
            ),
            204 => 
            array (
                'country' => 'SOUTH AFRICA',
                'code_2' => 'ZA',
                'code_3' => 'ZAF',
                'code_number' => '710',
            ),
            205 => 
            array (
                'country' => 'SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',
                'code_2' => 'GS',
                'code_3' => 'SGS',
                'code_number' => '239',
            ),
            206 => 
            array (
                'country' => 'SOUTH SUDAN',
                'code_2' => 'SS',
                'code_3' => 'SSD',
                'code_number' => '728',
            ),
            207 => 
            array (
                'country' => 'SPAIN',
                'code_2' => 'ES',
                'code_3' => 'ESP',
                'code_number' => '724',
            ),
            208 => 
            array (
                'country' => 'SRI LANKA',
                'code_2' => 'LK',
                'code_3' => 'LKA',
                'code_number' => '144',
            ),
            209 => 
            array (
                'country' => 'SUDAN',
                'code_2' => 'SD',
                'code_3' => 'SDN',
                'code_number' => '736',
            ),
            210 => 
            array (
                'country' => 'SURINAME',
                'code_2' => 'SR',
                'code_3' => 'SUR',
                'code_number' => '740',
            ),
            211 => 
            array (
                'country' => 'SVALBARD AND JAN MAYEN ISLANDS',
                'code_2' => 'SJ',
                'code_3' => 'SJM',
                'code_number' => '744',
            ),
            212 => 
            array (
                'country' => 'SWAZILAND',
                'code_2' => 'SZ',
                'code_3' => 'SWZ',
                'code_number' => '748',
            ),
            213 => 
            array (
                'country' => 'SWEDEN',
                'code_2' => 'SE',
                'code_3' => 'SWE',
                'code_number' => '752',
            ),
            214 => 
            array (
                'country' => 'SWITZERLAND',
                'code_2' => 'CH',
                'code_3' => 'CHE',
                'code_number' => '756',
            ),
            215 => 
            array (
            'country' => 'SYRIAN ARAB REPUBLIC (SYRIA)',
                'code_2' => 'SY',
                'code_3' => 'SYR',
                'code_number' => '760',
            ),
            216 => 
            array (
                'country' => 'TAIWAN, REPUBLIC OF CHINA',
                'code_2' => 'TW',
                'code_3' => 'TWN',
                'code_number' => '158',
            ),
            217 => 
            array (
                'country' => 'TAJIKISTAN',
                'code_2' => 'TJ',
                'code_3' => 'TJK',
                'code_number' => '762',
            ),
            218 => 
            array (
                'country' => 'TANZANIA, UNITED REPUBLIC OF',
                'code_2' => 'TZ',
                'code_3' => 'TZA',
                'code_number' => '834',
            ),
            219 => 
            array (
                'country' => 'THAILAND',
                'code_2' => 'TH',
                'code_3' => 'THA',
                'code_number' => '764',
            ),
            220 => 
            array (
                'country' => 'TIMOR-LESTE',
                'code_2' => 'TL',
                'code_3' => 'TLS',
                'code_number' => '626',
            ),
            221 => 
            array (
                'country' => 'TOGO',
                'code_2' => 'TG',
                'code_3' => 'TGO',
                'code_number' => '768',
            ),
            222 => 
            array (
                'country' => 'TOKELAU',
                'code_2' => 'TK',
                'code_3' => 'TKL',
                'code_number' => '772',
            ),
            223 => 
            array (
                'country' => 'TONGA',
                'code_2' => 'TO',
                'code_3' => 'TON',
                'code_number' => '776',
            ),
            224 => 
            array (
                'country' => 'TRINIDAD AND TOBAGO',
                'code_2' => 'TT',
                'code_3' => 'TTO',
                'code_number' => '780',
            ),
            225 => 
            array (
                'country' => 'TUNISIA',
                'code_2' => 'TN',
                'code_3' => 'TUN',
                'code_number' => '788',
            ),
            226 => 
            array (
                'country' => 'TURKEY',
                'code_2' => 'TR',
                'code_3' => 'TUR',
                'code_number' => '792',
            ),
            227 => 
            array (
                'country' => 'TURKMENISTAN',
                'code_2' => 'TM',
                'code_3' => 'TKM',
                'code_number' => '795',
            ),
            228 => 
            array (
                'country' => 'TURKS AND CAICOS ISLANDS',
                'code_2' => 'TC',
                'code_3' => 'TCA',
                'code_number' => '796',
            ),
            229 => 
            array (
                'country' => 'TUVALU',
                'code_2' => 'TV',
                'code_3' => 'TUV',
                'code_number' => '798',
            ),
            230 => 
            array (
                'country' => 'UGANDA',
                'code_2' => 'UG',
                'code_3' => 'UGA',
                'code_number' => '800',
            ),
            231 => 
            array (
                'country' => 'UKRAINE',
                'code_2' => 'UA',
                'code_3' => 'UKR',
                'code_number' => '804',
            ),
            232 => 
            array (
                'country' => 'UNITED ARAB EMIRATES',
                'code_2' => 'AE',
                'code_3' => 'ARE',
                'code_number' => '784',
            ),
            233 => 
            array (
                'country' => 'UNITED KINGDOM',
                'code_2' => 'GB',
                'code_3' => 'GBR',
                'code_number' => '826',
            ),
            234 => 
            array (
                'country' => 'UNITED STATES OF AMERICA',
                'code_2' => 'US',
                'code_3' => 'USA',
                'code_number' => '840',
            ),
            235 => 
            array (
                'country' => 'US MINOR OUTLYING ISLANDS',
                'code_2' => 'UM',
                'code_3' => 'UMI',
                'code_number' => '581',
            ),
            236 => 
            array (
                'country' => 'URUGUAY',
                'code_2' => 'UY',
                'code_3' => 'URY',
                'code_number' => '858',
            ),
            237 => 
            array (
                'country' => 'UZBEKISTAN',
                'code_2' => 'UZ',
                'code_3' => 'UZB',
                'code_number' => '860',
            ),
            238 => 
            array (
                'country' => 'VANUATU',
                'code_2' => 'VU',
                'code_3' => 'VUT',
                'code_number' => '548',
            ),
            239 => 
            array (
            'country' => 'VENEZUELA (BOLIVARIAN REPUBLIC)',
                'code_2' => 'VE',
                'code_3' => 'VEN',
                'code_number' => '862',
            ),
            240 => 
            array (
                'country' => 'VIET NAM',
                'code_2' => 'VN',
                'code_3' => 'VNM',
                'code_number' => '704',
            ),
            241 => 
            array (
                'country' => 'VIRGIN ISLANDS, US',
                'code_2' => 'VI',
                'code_3' => 'VIR',
                'code_number' => '850',
            ),
            242 => 
            array (
                'country' => 'WALLIS AND FUTUNA ISLANDS',
                'code_2' => 'WF',
                'code_3' => 'WLF',
                'code_number' => '876',
            ),
            243 => 
            array (
                'country' => 'WESTERN SAHARA',
                'code_2' => 'EH',
                'code_3' => 'ESH',
                'code_number' => '732',
            ),
            244 => 
            array (
                'country' => 'YEMEN',
                'code_2' => 'YE',
                'code_3' => 'YEM',
                'code_number' => '887',
            ),
            245 => 
            array (
                'country' => 'ZAMBIA',
                'code_2' => 'ZM',
                'code_3' => 'ZMB',
                'code_number' => '894',
            ),
            246 => 
            array (
                'country' => 'ZIMBABWE',
                'code_2' => 'ZW',
                'code_3' => 'ZWE',
                'code_number' => '716',
            ),
        ));
        
        
    }
}