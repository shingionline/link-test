<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OperatorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('operators')->insert(['id' => 3, 'name' => 'The Safari Partners', 'website' => 'https://test.safaribookings.com/dev-test-link/huYTJQdEowenFBZzk2NDhzODhGdlE9PSIsInZhbHVlIjoiYjhYd05FbjVFelhtalcxSWlEcHJUd', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 177, 'name' => 'Gondwana Tours & Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/ovdHlveTdhS2dROTMxcmQreGZCM2c9PSIsInZhbHVlIjoicmtHTW85MjJUMWM3THgva2JmTnhaK', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 209, 'name' => 'Pembury Tours', 'website' => 'https://test.safaribookings.com/dev-test-link/Q1OVdzNFBKTktIVDJPZDB2SWhrd1E9PSIsInZhbHVlIjoibTZ5ampmdCtiSk5jVmtxOFVHRVRpU', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 410, 'name' => 'Boundless Africa Journeys', 'website' => 'https://test.safaribookings.com/dev-test-link/5Uc2VvMkdlNXhwWUswQm5pZlFDRmc9PSIsInZhbHVlIjoiMEF0TXlwUU43K1NKSkpBRUVQUzVIa', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 557, 'name' => 'Zambezi Safari & Travel Co Ltd', 'website' => 'https://test.safaribookings.com/dev-test-link/x1emFVTWRmcm1LVHNFL01FSjd0WFE9PSIsInZhbHVlIjoiZVB4TG5TMjBZQmlTSzYzMHF0cHFOU', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 575, 'name' => 'Kenya Walking Survivors Safaris Ltd', 'website' => 'https://test.safaribookings.com/dev-test-link/tOVlZlaGJ2STJCSkpkOXc4ZFFnQ2c9PSIsInZhbHVlIjoiWFdGMnpaenpoRDBhSWpscEwwaS91V', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 619, 'name' => 'Compass Odyssey', 'website' => 'https://test.safaribookings.com/dev-test-link/IyRytMSG1oaHM2RDdoMFo0VUNBdnc9PSIsInZhbHVlIjoiS0dZM2MrajUvTXN0eXdLRGVoMWFwc', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 620, 'name' => 'Discover Africa', 'website' => 'https://test.safaribookings.com/dev-test-link/83NTJ0TXo5NGFzc09wSW9ZeFB1Y2c9PSIsInZhbHVlIjoiVnRCUGxIanVBdUJoekdIMkEvZnp1M', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 663, 'name' => 'E-Trip Africa', 'website' => 'https://test.safaribookings.com/dev-test-link/hDLzdrSlFkbWFKWVBMeG9oS2xBQmc9PSIsInZhbHVlIjoiZ0ZZdnZkM2JlSjEyVVVtSWVaQ0xpN', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 693, 'name' => 'Yellow Zebra Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/VldzBiQUFteEtBd0pqRXRIcStsNFE9PSIsInZhbHVlIjoidFNVUXdFMlZxQkJsSXYvamtLV2lNN', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 694, 'name' => 'African Paradise Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/VnZnliUk4xamF4MTh0QXUzRjQyNUE9PSIsInZhbHVlIjoicnNWVTNtb25DakZvak1uRlNzNld0U', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 696, 'name' => 'Afrishare Trekking & Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/dyVHdUYjQweWZhUlRmQmk2ZVVId3c9PSIsInZhbHVlIjoiQzFlVENzR2NWNkVsWWRNcTJ3dHRha', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 750, 'name' => 'Giltedge', 'website' => 'https://test.safaribookings.com/dev-test-link/FzSGpXajB6akl1aEp4WW1tdUlPamc9PSIsInZhbHVlIjoibVIwdTZrQkFaYW45MXd2bXNiU2xmS', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 788, 'name' => 'Indigo Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/hHWWtTb2Y3aW1LYitpWGFMeGFvSEE9PSIsInZhbHVlIjoiWWlSTHd6WktkK3NUNmRsSy9BRlU1N', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 798, 'name' => 'Wildebeest Safaris LTD', 'website' => 'https://test.safaribookings.com/dev-test-link/U3SXdrN1RxVXlSdjE2OGpzTFJGSlE9PSIsInZhbHVlIjoiRnNQUlVSRzRPVkswRXVTYlFqeURPQ', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 801, 'name' => 'Right Choice Tours & Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/tId0NiQ3ZhSUF6TXBrK04rN1VidUE9PSIsInZhbHVlIjoiOWJGT1JIYlU2dmc3RktvVkpHNW1NY', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 807, 'name' => 'Regional Tours & Safaris Ltd', 'website' => 'https://test.safaribookings.com/dev-test-link/I1S1NHbzhQbFg0N2xMNU91STFrVEE9PSIsInZhbHVlIjoiWEdmbXVqdmJsRnlsUnBHcTBvcG9LV', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1135, 'name' => 'Go2Africa', 'website' => 'https://test.safaribookings.com/dev-test-link/o0d2M2K2NpVjJyRm1CVjZPL1JBcEE9PSIsInZhbHVlIjoieXFuRG9tT1k5eGN4c2VmcnVPUFl4U', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1517, 'name' => 'Uhuru Travel & Tours', 'website' => 'https://test.safaribookings.com/dev-test-link/tTaFR0YThDb3p5U0dOVHRZTmoyN2c9PSIsInZhbHVlIjoiTzRIZUpqKzd5TnNIRTdneStHTDRMQ', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1586, 'name' => 'Karibu Safaris In Kenya', 'website' => 'https://test.safaribookings.com/dev-test-link/djcSt3d1dkZXN2b2pGNVFUeEtUNFE9PSIsInZhbHVlIjoiUUdUQmNHa3N0dHlqM0YzQk9zNWQ4a', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1683, 'name' => 'Earthlife Expeditions', 'website' => 'https://test.safaribookings.com/dev-test-link/dOVGxqYXR3VFJ1dUR4WVFsYTY3cFE9PSIsInZhbHVlIjoiZkxjRGNZMTRKZkErbm9ScW1HUlN6d', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1687, 'name' => 'Safarihub', 'website' => 'https://test.safaribookings.com/dev-test-link/w3MTV3UTVCOEhDOEsrQ2U4SENGeWc9PSIsInZhbHVlIjoiSVpFSmlLaXhLL0ZVZWtqNFNVR1lTd', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1701, 'name' => 'Ker & Downey Africa', 'website' => 'https://test.safaribookings.com/dev-test-link/J5dG9HTVRQeEg3SGV5NWc0TTlOR2c9PSIsInZhbHVlIjoiQ2p5YW5UN2VvbkFDWmtMSnBMdDlPW', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1750, 'name' => 'Seven By Far Travel', 'website' => 'https://test.safaribookings.com/dev-test-link/VzZUp6dHN5TmlVZWNpQzh0dnMzVmc9PSIsInZhbHVlIjoiMG5xdE41YkZaWi8wYVBzUlpPR2RMS', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1786, 'name' => 'Mamaland Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/dKMW9RMTNJSGg1bFVLVXBCbjhrWWc9PSIsInZhbHVlIjoiR0tKRytuL0hidnFZN2xLdXhKdVN6U', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1829, 'name' => 'Tanzania Mwangaza Safari', 'website' => 'https://test.safaribookings.com/dev-test-link/o0QkZEZ3NuT2RYMjM3UitPM3Jxcnc9PSIsInZhbHVlIjoiSExEWmFpZXhlN25vdFphS1pOalo5M', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1859, 'name' => 'Beacon Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/1oN1lWZUVZekRkTENVeTkwd2gzcFE9PSIsInZhbHVlIjoiaVIvOFp6OUNuUjhTOXh4OHNnYW9lM', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1962, 'name' => 'Benson Safaris Tanzania', 'website' => 'https://test.safaribookings.com/dev-test-link/4xV2RDOEhpL2pxUER0TFlhNUtVc2c9PSIsInZhbHVlIjoiaXdQN2lTTUoxNlU1ZmhqeGpNT2F5T', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 1988, 'name' => 'Safari With Us', 'website' => 'https://test.safaribookings.com/dev-test-link/l6Z29zTkU5ZjVkUWY1UlA2dUc0Z1E9PSIsInZhbHVlIjoiSTZpNVNvc2tRWkpaeTVEZ2RNRzFuM', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2109, 'name' => 'Kruger Park Tours', 'website' => 'https://test.safaribookings.com/dev-test-link/xOeEZRVHpzbkFaRjdDdmMwN2RaK1E9PSIsInZhbHVlIjoiMFBUSTBCdmFSTXR0aFhWSlJkUlNwT', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2220, 'name' => 'Viva Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/JnSUFBT0VXVGRZalV4MWFlYWY4UkE9PSIsInZhbHVlIjoiSUY5THNNUWZUeVlmc0VCNnRTaWVPZ', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2308, 'name' => 'Trip Advisor Africa Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/R1bHN6QVNDbUZWMDhYK0VaN2ZWb3c9PSIsInZhbHVlIjoiYnBMYnNha3ppZi8rQmNEdG1EZjBwM', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2335, 'name' => 'Jewel of Africa Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/IzWVFJWXNiRDBkZ3B4TUVSVTNOcEE9PSIsInZhbHVlIjoiK2c1QlZzWUU1NW1JSGNmeUxMRUxEU', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2378, 'name' => 'Kruger Park Travel ', 'website' => 'https://test.safaribookings.com/dev-test-link/95dEo1LzRjcENJWTJhc2FBdnpDbVE9PSIsInZhbHVlIjoiaFFETFRUT0dNdExvQldDTnpGQ3F0d', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2399, 'name' => 'Amazing Memories Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/E2TnZqTFpRVVB4UW5uVFBoZ2cxL1E9PSIsInZhbHVlIjoic3FRNWNBeDd0NmV2NjVmSUw4Nkt6T', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2521, 'name' => 'Shemeji Safari Tanzania', 'website' => 'https://test.safaribookings.com/dev-test-link/xCMS9ERXo1K2xFeVpwR1Nta09MYXc9PSIsInZhbHVlIjoiVFFqbHNXdEdzZjRrQXJacWtBc0VmU', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2583, 'name' => 'Home To Africa Tours and Travel', 'website' => 'https://test.safaribookings.com/dev-test-link/ZoTk03ajFBSUhWK0dKSFRxaUhJa0E9PSIsInZhbHVlIjoiUmFkM2RDd0lyK29OR0NYRlFSM0NDS', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2586, 'name' => 'Axis Africa Expedition & Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/ZMUlJxdzE1VEZXQUlicmV0NThYUGc9PSIsInZhbHVlIjoicmZEZVVKUUcySVA4UHdDLzNJRHZUe', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2673, 'name' => 'Lion King Adventures', 'website' => 'https://test.safaribookings.com/dev-test-link/V6ZUQ4VVI5ZkVNZSsvdHZMNUMrcmc9PSIsInZhbHVlIjoiNjQ2VEV5OWhWRWp6L1hDMjBKb1ZqU', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2721, 'name' => 'Classic Journeys Africa', 'website' => 'https://test.safaribookings.com/dev-test-link/ZZbHQrbkVnMDNxQkpiOGEzVy8veWc9PSIsInZhbHVlIjoiNHh3K1RWNmJsQWlJaXk0eWZ3Q0JPY', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2750, 'name' => 'Unlimited Expeditions - The Soul of Tanzania', 'website' => 'https://test.safaribookings.com/dev-test-link/oyYnMwalVhOE9xRk82b1pTOTRQMVE9PSIsInZhbHVlIjoiRzJIWER6NEo2UDdYUHkvUUN1d2FIY', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2770, 'name' => 'TravelPartners ', 'website' => 'https://test.safaribookings.com/dev-test-link/BMemIyVFRYeEtOUU1XSExHTVdVOEE9PSIsInZhbHVlIjoiSmtIOTk5TWJsQnI5VFp0NzhyRG1EZ', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2816, 'name' => 'Features Africa Journeys', 'website' => 'https://test.safaribookings.com/dev-test-link/sveVZaSnFGZHpZNWJka0dGeElyMmc9PSIsInZhbHVlIjoiMEVkZ1NTLy9TUlJkbHJoVXlsUGx4a', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 2992, 'name' => 'Selous Ngalawa Camp', 'website' => 'https://test.safaribookings.com/dev-test-link/ZTbDFSTVp5emM0WFJxMXZ6d0pjYmc9PSIsInZhbHVlIjoiaGMrRGZUNEdRaHl2N0IxWlFQSWlwV', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 3040, 'name' => 'Suricata Safaris', 'website' => 'https://test.safaribookings.com/dev-test-link/VBRmVyNDhuaXBLV0JRT0ZBU3FKTFE9PSIsInZhbHVlIjoiUXhHZFFTcU1IOStBZVJMcEkxTFVCZ', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 3099, 'name' => 'Spirit of Kenya', 'website' => 'https://test.safaribookings.com/dev-test-link/w4bnp4eVN5cUNvaWdOdVhxMFVyYUE9PSIsInZhbHVlIjoickVETlIxYjNzY3ppQkZUQVJWTisyM', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 3101, 'name' => 'Wayfairer Travel', 'website' => 'https://test.safaribookings.com/dev-test-link/5SM1V5WE0vN3gvcEF5YU8xbjcvVlE9PSIsInZhbHVlIjoibUFNYlJaTXlnVS8xR1FsZmNNUlp2N', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 3273, 'name' => 'Orongai Africa Safari', 'website' => 'https://test.safaribookings.com/dev-test-link/xqcTV1WVJXQmpMQzFIWkNwK2JnQ0E9PSIsInZhbHVlIjoiQXJTNk9xdElaWEFRQnJ3TjNlQjl6M', 'created_at' => Carbon::now()]);
        DB::table('operators')->insert(['id' => 4336, 'name' => 'SafariOffice', 'website' => 'https://test.safaribookings.com/dev-test-link/BVc1ZXNG5WenQ1a0pCY2JVeW1lTkE9PSIsInZhbHVlIjoiejkxSHRkdjdYTGpUMGFEWmxieDZ6T', 'created_at' => Carbon::now()]);

    }
}
