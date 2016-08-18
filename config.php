<?php
include 'dane.php';
$config   = [];
$config[] = [];
	
/** Bot id 1 configuration **/	
$config[1]['connection'] = [
		/** 
         * @name TeamSpeak3 Server IP Adress
         * @format 0.0.0.0
         */
		 
			'server_ip'                        => $serverip,
			
		/**
         * @name TeamSpeak3 Server Query Port
         * @default 45555
         */	
			'server_query_port'                => $port,
			
		/**
         * @name TeamSpeak3 Server ID
         * @default 1
         */	
		 
			'server_id'                        => 1,
			
		/**
          * @name TeamSpeak3 Server Query Login
          * @default serveradmin
          */
		  
			'server_query_login'               => 'serveradmin',
			
		/**
          * @name TeamSpeak3 Server Query Password
		  */	
		  
			'server_query_password'            => $querypass,
			
			
		/**
          * @name Enable/Disable commands mode in TeamSpeak3 Query [Important: Look at the configuration config > options > enable_commands_system]
          * @default false
          */
		  
			'commands_mode'                    => false,
			
		/**
          * @name There you can change bot nickname
          * @default mBot Premium
          */
		  
			'bot_name'                         => 'Aktualizator',
		
		/**
          * @name Channel ID where bot enter (false - disable / id - enable)
          * @default false
          */
		
			'move_to_channel'                  => 11
		 
];
$config[1]['server'] = [
		/**
         * This is a checksum done edit this.
         * @default false
         */
			'checksum' => $checksum,
			
];
$config[1]['options']    = [
	
	    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_plugins_and_events_system' => true,
			
		/**
         * @name Enable/Disable mysql system
         * @default true
         */
		
			'enable_database' 				   => true,
			
		/**
         * @name The folder name from the events and plugins
         * @default FirstInstance
         */	
			
			'folder_name' 					   => 'FirstInstance',
			
		/**
         * @name Bot idle time before do next tasks
         * @default 1
         */	
		 
			'idle_seconds'                     => 1,
			
			    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_commands_system' => false
		
];

/** Mysql configuration **/	
$config[1]['db'] = [

	'host'                        => $host,
	'user'                		  => $user,
	'pass'                        => $pass,
	'name'                        => $name
		 
];
/** end of mysql configuartion **/	
	
	
$config[1]['plugins'] = [
	
		/**
         * @name Dosabled plugins
         * @format 'simplePlugin'
         */
	
			'ignored_plugins' => ['banGroups', 'noRecording', 'serverGroupProtection'], 
			
		/**
         * @name Specyfic plugin configurations
         */	

			'plugins_configs' => [
				'awayGroup' => [
					'away_group' => 29, // Grupa, która ma nadać
					'groups_ignore' => [],	// Grupy ignorowane	
					'time' => 1 * 60,
				],
				'connectMessage' => [
				/* 
					Dostępne wpisy:
					* [SERVER_NAME] - Serwer: Nazwa Serwera,
					* [SERVER_MAX_CLIENTS] - Serwer: Maksymalna ilość klientów,
					* [SERVER_CLIENTS] - Serwer: Aktualnie online,
					* [SERVER_HOST_MESSAGE] - Serwer: Wiadomość hostu,
					* [SERVER_WELCOME_MESSAGE] - Serwer: Wiadomość powitalna,
					* [SERVER_VERSION] - Serwer: Wersja serwera,
					* [SERVER_PLATFORM] - Serwer: Platforma serwera,
					* [SERVER_CLIENTS_PERCENT] - Serwer: Procent zajętych slotów np 512/512 (100,
					* [SERVER_PACKET] - Serwer: Ilość pakietów na serwerze,
					* [SERVER_PING_TOTAL] - Serwer: Ilość pingu,
					* [CLIENT_NICKNAME] - Użytkownik: Nazwa użytkownika,
					* [CLIENT_LAST_CONNECT] - Użytkownik: Ostatnie połączenie,
					* [CLIENT_COUNTRY] - Użytkownik: Kraj użytkownika,
					* [CLIENT_CONNECT] - Użytkownik: Ilość połączeń,
					* [Client_ID] - Użytkownik: Unikalny identyfikator
				*/
					'cache_file' => '/home/mbot1/cache/connection_record',
					'poke' => [
						'poke_message_status' => false,
					]
				],
				'noRecording' => [
                    'no_record_channels' => [], // Kanały gdzie nie można nagrywać.
                    'groups_ignore' => [] // Grupy ignorowane
               ],
			    'banGroups' => [
				/**
					Plugin służacy do automatycznego nadawanie bana użytkownikowi dzięki nadaniu mu odpowiedniej grupy.
					Informacje:
						[*] 'time' 		- Służy do definiowania czasu bana w sekundach.
						[*] 'group' 	- Tutaj wpisujemy id grupy po nadaniu, której otrzyma ktoś bana.
						[*] 'reason'	- Tutaj wpisujemy powód bana, który się wyświetli po nadaniu grupy.
					Dodawanie kolejnego rekordu:
						Wystarczy, że skopiujesz to i uzupełnisz: 
							1 => array('time' => 0, 'group' => 0, 'reason' => 'Powód bana'),

				*/
					'groups' => [
						0 => ['time' => 15 * 60, 'group' => 209, 'reason' => 'Ban nadany na okres 15 minut.'],
					]
			    ],
			   'serverGroupProtection' => [
			   /**
				Plugin służacy do ochrony wyznaczonych grup.
				Informacje:
					[*] 'protection_group'   - Tutaj należy wpisać wszystkie grupy chronione,
					[*]	'userInGroup'		 - Tutaj wpisujemy "unique_id" => id_grupy.
			   */
			   'protectionGroup' => [171, 169, 172, 173],
			   'userInGroup' => [
				# Unikalne => grupa
					"oszt+w3HKrUqIarI9rf5jF+6LV0=" => 171,
					"iAhGzRZUtnA0W6btX97UOC5cQ9g=" => 171,
					"mbLh/DXtjQUtabZZmFwm1Q3T6j4=" => 173,
					"Qh7aqydnLTYrDXFuFYn2FEVvEXs=" => 169
			   ]			   
			],
			'proxyBlocker' => [
				/**
					 Plugin służący do wykrywania użytkowników, którzy korzystają z Virtual Private Network czyt. VPN.
					 Informacje:
						[*] 'group_ignore' 		- Tutaj wpisujemy grupy, które ma ignorować.
				*/
				
				'Notifications' => [
					'status' => true,
					'groups' => [287]
				],
				'groups_ignore' => [26,27,201]
			]
	]
];
	
$config[1]['events'] = [
	
		/**
         * @name Dosabled events
         * @format 'simpleEvent'
         */
	
			'ignored_events' => ['channelMessage', 'adminsOnlineeng', 'poke_adminseng'],

		/**
         * @name Specyfic events time configuration
         */	
		
			'events_executes' => [
			
				'serverName' => ['seconds' => 10,'minutes' => 1,'hours'   => 0,'days' => 0],
				
				'onlineRecord' => ['seconds' => 3,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'adminsOnline' => ['seconds' => 5,'minutes' => 2,'hours' => 0,'days' => 0],
				
				'eliteOnline' => ['seconds' => 5,'minutes' => 2,'hours' => 0,'days' => 0],				
				
				'adminsOnlineeng' => ['seconds' => 5,'minutes' => 2,'hours' => 0,'days' => 0],
				
				'groupOnline'=> ['seconds' => 15,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'adminList' => ['seconds' => 1,'minutes' => 3,'hours' => 0,'days' => 0],
				
				'adminsOnChannels' => ['seconds' => 5,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'topConnectionTime' => ['seconds' => 0, 'minutes' => 5, 'hours' => 0, 'days' => 0],
				
				'topConnections' => ['seconds' => 0, 'minutes' => 5, 'hours' => 0, 'days' => 0],
				
				'timeSpent' => ['seconds' => 2, 'minutes' => 5, 'hours' => 0, 'days' => 0],
				
				'topoftheweek' => ['seconds' => 0, 'minutes' => 3, 'hours' => 0, 'days' => 0],
				
				'poke_admins' => ['seconds' => 15, 'minutes' => 0, 'hours' => 0, 'days' => 0],
				
				'poke_adminseng' => ['seconds' => 15, 'minutes' => 0, 'hours' => 0, 'days' => 0],
				
				'multiFunction' => ['seconds' => 30, 'minutes' => 0, 'hours' => 0, 'days' => 0],
				
				'channelGroup' => ['seconds' => 3,'minutes' => 0,'hours'  => 0,'days' => 0],	
				
				'channelMessage' => ['seconds' => 3,'minutes' => 0,'hours'  => 0,'days' => 0],	
				
				'reklama' => ['seconds' => 5, 'minutes' => 0, 'hours' => 1, 'days' => 0],
			],
			
		/**
          * @name Specyfic event configurations
          */
			
			'events_configs' => [
			
				'serverName' => [
					'change_modal_message' => [
						'status' => true,
					],
					'name' => 'GadamTu.pl ® OnlineSpeak.eu | Stabilny TS3 | Online: [online]',
				],
				
				'channelGroup' => [
					'onClientAreOnChannel' => [28, 29, 30], // Wszystkie kanały
						'groups' => [
							28 => [23], // Kanał = grupa, która ma nadac po wejściu
							30 => [26], // Kanał = grupa, która ma nadac po wejściu
							29 => [24] // Kanał = grupa, która ma nadac po wejściu
						],
						'all_groups' => [23, 24, 26], // Wszystkie grupy
						'time' => 1 * 1 // Czas jaki trzeba odczekać aby otrzymać rangę
				],
				
				'channelMessage' => [
					'onClientAreOnChannel' => [57],
						'groups' => [
							57 => 'Witaj, [b][name][/b].\n Twój link do procesu rejestracyjnego to: [url=http://entrone.eu/?verification&id=[id]]Przejdź[/url].',
						],
					'acces' => [177, 178]
				],
				
				'adminsOnChannels' => [
					'adminList' => [
						'BvtE4kTmroVRU9jbBfGVhFQndxc=' => [ //mareczin
							'channel_id' => 86
						],
						'vaHI/vWhfH2ldeqkIcmNtxU4OPQ=' => [ //szymon
							'channel_id' => 1690
						],						
						'LoG20O06xTAkz6kGvf9aRZNc48A=' => [ //arni
							'channel_id' => 1193
						],
						'Y9JoAjtAKe3WLc6YOC71YA+oQz8=' => [ //taco
							'channel_id' => 360
						],
						'lCeq7RLwON2xoN5qO5OKemJoRWk=' => [ //m4gik
							'channel_id' => 1194
						],
						'zuLe/hraaqUmwOVoKjP/xaf25K0=' => [ //kajetsan
							'channel_id' => 568
						],
						'CWAPr13ZmvVmpBuoe8LRVui+C78=' => [ //orzeszek
							'channel_id' => 1192
						],
						'+rrGsA8lU5qkF6HFL2nDK/CvaQI=' => [ //sadlotorusek
							'channel_id' => 1305
						],
						'7kFviyGhVVMwvvMenRIZjAbSml4=' => [ //orzeszek ten dziwny
							'channel_id' => 2759
						],
						'V9zNhq/YiKaXC1XFFESNg6rvxFQ=' => [ //jkblue
							'channel_id' => 2761
						],
						'KAJxBv+US8ebTWNxsJefnQhDAxA=' => [ //gremson
							'channel_id' => 2760
						],	
						'JJaMLomiXDX3MHZTnlHnMkdz1pA=' => [ //gremson
							'channel_id' => 2758
						],						
						/*
							Aby dodać kolejny rekord należy wpisywać tak:
							'Unique ID' => array(
								'channel_id' => 0 // Tutaj id kanału danego admina
							),
						*/
					],
					'channel_name' => '[[admin_status]] [admin_nick]', // Jak ma wyświetlać teraz np. [Query]  [Offline] [KlassKai]
					'groups' => [287,301,317,35,37,38], // Wpisujemy wszystkie grupy administracji
				],
				
				'topConnectionTime' => [
					'top_desc' => '[center][size=15][b]Ranking TOP [records][/b]\n Najdłuższe połączenie[/center]\n\n',
					'write_channel' => 713, // Kanał, gdzie ma wypisywać osoby.
					'numbers_of_records' => 10, // Ilośc rekordów
					'ignore_idle_time' => 10 * 60,
					'groups_ignore' => [25,26,27,223,8] // Ignorowane grupy.
				],
				
				'topConnections' => [
					'top_desc' => '[center][size=15][b]Ranking TOP [records][/b]\n Największa ilość połączeń[/center]\n\n',
					'write_channel' => 715, // Kanał, gdzie ma wypisywać osoby.
					'numbers_of_records' => 10, // Ilośc rekordów
					'groups_ignore' => [25,26,27,223,8] // Ignorowane grupy.
				],
				
				'timeSpent' => [
					'top_desc' => '[center][size=15][b]Ranking TOP [count][/b]\n Spędzony czas[/center]\n\n',
					'write_channel' => 714, // Kanał, gdzie ma wypisywać osoby.
					'numbers_of_records' => 10, // Ilośc rekordów
					'ignore_idle_time' => 10 * 60,
					'interval' => 5 * 60, // Tutaj zostawiamy bez zmian, w przypadku gdy zmienimy czas edytowania kanału tutaj tez.
					'groups_ignore' => [25,26,27,223,8] // Ignorowane grupy.
				],
				
				'onlineRecord' => [
					'write_channel' => 711, // Kanał gdzie ma wpisywać
					'name' => '● Rekord online: [record]', // Nazwa kanału
					'description' => '[center][size=15][b]Informacje - Serwer[/b]\n Rekord dostępnych użytkowników[/center]\n[size=10]\nObecny rekord wynosi: [b][record][/b].\nRekord ustanowiono: [b][date][/b][/size][right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]',
					'cache_file' => '/home/mbot1/inc/cache/recordOnline' // Wpisujemy sciężkę do pliku.
				],
				
				'topoftheweek' => [
					'top_desc' => '[center][size=15][b]Ranking najaktywniejszych z całego tygodnia[/center]\n',
					'write_channel' => 1244, // Kanał, gdzie ma wypisywać osoby.
					'numbers_of_records' => 10, // Ilośc rekordów
					'interval' => 5 * 60, // Tutaj zostawiamy bez zmian, w przypadku gdy zmienimy czas edytowania kanału tutaj tez.
					'ignore_idle_time' => 10 * 60,
					'groups_ignore' => [25,26,27,223,8], // Ignorowane grupy.
					'cache_path' => '/home/mbot1/inc/cache/',
				],
				
				'adminsOnline' => [
					'write_channel' => 91, // Kanał gdzie ma wpisywać
					'channel_name' => '[cspacer] Dostępnych adminów: [admins] [name]', // Nazwa kanału
					'up_description' => '\n [center][size=11][b]Status Administracji[/size][/center]\n\n',
					'groups' => [287,301,317,35,37,38] // Grupy administracji
				],
				
				'eliteOnline' => [
					'up_description' => '\n [center][size=15][b]Lista Elitarnych[/size][/center]\n\n',
					'groups' => [318,320], // Grupy administracji np. array(3,5),
					'away_time' => 10 * 60, // Czas po jakim ma pokazywac Away.
					'channel' => 2395, // Kanał gdzie ma wypisywać
				],
				
				'adminsOnlineeng' => [
					'write_channel' => 1026, // Kanał gdzie ma wpisywać
					'channel_name' => '● Admins Online: [admins]', // Nazwa kanału
					'up_description' => '\n [center][size=11][b]Status Administration[/size][/center]\n\n',
					'groups' => [302,218,219,220,221] // Grupy administracji
				],
				
				'groupOnline' => [
					'up_description' => '\n [center][size=11][b]Strefa VIP[/center]\n\n',
					'clans' => [
						1 => [
							'group' => [32],
							'cid' => 76,
							'name' => '[rspacer][1SVIP] Użytkowników online: [online]'
						],
						2 => [
							'group' => [79],
							'cid' => 92,
							'name' => '[rspacer][1VIP] Użytkowników online: [online]'
						],
						3 => [
							'group' => [204],
							'cid' => 597,
							'name' => '[rspacer][2VIP] Użytkowników online: [online]'
						],
						4 => [
							'group' => [307],
							'cid' => 2399,
							'name' => 'LPS - Online: [online]'
						],
						5 => [
							'group' => [309],
							'cid' => 2110,
							'name' => 'FRUT - Online: [online]'
						],
						6 => [
							'group' => [315],
							'cid' => 2178,
							'name' => '[rspacer][3VIP] Użytkowników online: [online]'
						],
						7 => [
							'group' => [324],
							'cid' => 2753,
							'name' => 'FROG - Online: [online]'
						],
						8 => [
							'group' => [335],
							'cid' => 2781,
							'name' => 'AREA - Online: [online]'
						],			
                        9 => [
							'group' => [336],
							'cid' => 2818,
							'name' => 'MIND - Online: [online]'
						],										
                        10 => [
							'group' => [337],
							'cid' => 2855,
							'name' => 'FAP - Online: [online]'
						],                      						
					],
				],
				
				'adminList' => [
					'up_description' => '\n [center][size=15][b]Lista Administracji[/size][/center]\n\n',
					'groups' => [287,301,317,35,37,38], // Grupy administracji np. array(3,5),
					'away_time' => 10 * 60, // Czas po jakim ma pokazywac Away.
					'channel' => 95, // Kanał gdzie ma wypisywać
				],	
				
				'poke_admins' => [
					'type' => 'poke', // Dostępne typy: poke/pw
                    'onClientAreOnChannel' => [25], // Lista kanałów pomocy
                    'groups_poke' => [
                        25 => [287,301,317,35,37,38], // Kanał = grupy, które ma poketować.
                    ],
					'ignored_channel' => [], // Ignorowane kanały, jeżeli będzie tam admin nie dostanie poke.
					'groups' => [287,301,317,35,37,38], // Rangi, które mają dostawać poke, wpisujemy wszystkie
                ],
				
				'poke_adminseng' => [
					'type' => 'poke', // Dostępne typy: poke/pw
                    'onClientAreOnChannel' => [1025], // Lista kanałów pomocy
                    'groups_poke' => [
                        1025 => [302,218,219,220,221], // Kanał = grupy, które ma poketować.
                    ],
					'ignored_channel' => [], // Ignorowane kanały, jeżeli będzie tam admin nie dostanie poke.
					'groups' => [302,218,219,220,221], // Rangi, które mają dostawać poke, wpisujemy wszystkie
                ],
				
				'multiFunction' => [
					'status' => true, // Status
					'Current_time' => [
						'status' => true, // Status
						'channel_to_typing' => 2120, // Kanał gdzie ma wpisywać
						'channel_name' => '[cspacer]» Godzina: [time] «' // Nazwa kanału
					],
					'Number_of_channels' => [
						'status' => true, // Status
						'channel_to_typing' => 707, // Kanał gdzie ma wpisywać
						'channel_name' => '● Ilość kanałów: [channels]' // Nazwa kanału
					],
					'Online_list' => [
						'status' => true, // Status
						'channel_to_typing' => 709, // Kanał gdzie ma wpisywać
						'channel_name' => '● Użytkowników online: [clients]' // Nazwa kanału
					],
					'Away_list' => [
						'status' => true, // Status
						'channel_to_typing' => 2819, // Kanał gdzie ma wpisywać
						'channel_name' => '› Niedostępni użytkownicy: [clients] [name]' // Nazwa kanału
					],
					'Private_channels' => [
						'status' => true, // Status
						'pid' => [103], // Wpisujemy sekcję kanałow prywatnych
						'channel_to_typing' => 708, // Kanał gdzie ma wpisywać
						'channel_name' => '● Kanałów prywatnych: [priv_channels]' // Nazwa kanału
					]
				],
			]
];
/** end of adds configuration **/
/** Bot id 2 configuration **/
$config[2]['connection'] = [
		/** 
         * @name TeamSpeak3 Server IP Adress
         * @format 0.0.0.0
         */
		 
			'server_ip'                        => $serverip,
			
		/**
         * @name TeamSpeak3 Server Query Port
         * @default 45555
         */	
			'server_query_port'                => $port,
			
		/**
         * @name TeamSpeak3 Server ID
         * @default 1
         */	
		 
			'server_id'                        => 1,
			
		/**
          * @name TeamSpeak3 Server Query Login
          * @default serveradmin
          */
		  
			'server_query_login'               => 'serveradmin',
			
		/**
          * @name TeamSpeak3 Server Query Password
		  */	
		  
			'server_query_password'            => $querypass,
			
			
		/**
          * @name Enable/Disable commands mode in TeamSpeak3 Query [Important: Look at the configuration config > options > enable_commands_system]
          * @default false
          */
		  
			'commands_mode'                    => false,
			
		/**
          * @name There you can change bot nickname
          * @default mBot Premium
          */
		  
			'bot_name'                         => 'Strażnik kanałów',
		
		/**
          * @name Channel ID where bot enter (false - disable / id - enable)
          * @default false
          */
		
			'move_to_channel'                  => 11
		 
];
$config[2]['server'] = [
		/**
         * This is a checksum done edit this.
         * @default false
         */
			'checksum' => $checksum,
			
];
$config[2]['options']    = [
	
	    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_plugins_and_events_system' => true,
			
		/**
         * @name Enable/Disable mysql system
         * @default false
         */
		
			'enable_database' 				   => false,
			
		/**
         * @name The folder name from the events and plugins
         * @default FirstInstance
         */	
			
			'folder_name' 					   => 'ThirtyInstance',
			
		/**
         * @name Bot idle time before do next tasks
         * @default 1
         */	
		 
			'idle_seconds'                     => 10,
			
			    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_commands_system' => false
];
	
$config[2]['plugins'] = [
		/**
         * @name Disabled plugins
         * @format 'simplePlugin'
         */
		 
			'ignored_plugins' => [], 
			
		/**
         * @name Specyfic plugin configurations
         */
			
			'plugins_configs' => [
			
				'channelCheckers' => [
					'checker_type'         		  => 'topicdate', 
					'channel_name_regex'   		  => '/[0-9]{1,3}\.(.*)/', 
					'channel_num_regex' 		  => '/(.*)\.(.*)/',
					'channel_data_regex'  		  => '/^[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/',
					'date_name'					  => '[ZMIEŃ DATĘ]', // W przypadku gdy kanał jest starszy niż 7 dni, co ma dopisywać do niego jako informację.
					'check_channel_names'  	      => true, // Czy ma sprawdzać nazwy.
					'Editing_by_Admin'	  	      => true, // Gdy właściciel kanału jest na nim data się aktualizuje
					'check_channel_data'   		  => true, // Sprawdzanie daty.
					'head_channel_admin_group_id' => 14, // ID rangi kanałowej głównej.
					'channel_admin_group_id' 	  => 17, // ID rangi kanałowej zaraz po głownej.
					'chennel_pid'         		  => [103], // Sekcja, gdzie znajdują się kanały prywatne.
					'channels_section' 			  => 103, // Sekcja, gdzie znajdują się kanały prywatne.
					'foul_language' 		      => ['fuck','shit','PGC24','pgc24','mareczin','ssie','pizda','hitler','cwel','spierdalaj','skurwiel','idiota','dziwka','suka','jebac','kurwa','huj','cipa','chuj','server admin','Support Admin','Manager Admin','Public Admin','Junior Public Admin','Guardian Admin','Admin','.pl','.eu','.com','online-ts3','net-speak'],
					'freeChannels_name'			  => 'Prywatny Kanał - Wolny', // Nazwa kanałów wolnych
					'minimal_freeChannels'		  => 20, // Minimalna ilość kanałów wolnych	
				],
			]
];
/** end of adds configuration **/
/** Bot id 3 configuration **/
$config[3]['connection'] = [
		/** 
         * @name TeamSpeak3 Server IP Adress
         * @format 0.0.0.0
         */
		 
			'server_ip'                        => $serverip,
			
		/**
         * @name TeamSpeak3 Server Query Port
         * @default 45555
         */	
			'server_query_port'                => $port,
			
		/**
         * @name TeamSpeak3 Server ID
         * @default 1
         */	
		 
			'server_id'                        => 1,
			
		/**
          * @name TeamSpeak3 Server Query Login
          * @default serveradmin
          */
		  
			'server_query_login'               => 'serveradmin',
			
		/**
          * @name TeamSpeak3 Server Query Password
		  */	
		  
			'server_query_password'            => $querypass,
			
			
		/**
          * @name Enable/Disable commands mode in TeamSpeak3 Query [Important: Look at the configuration config > options > enable_commands_system]
          * @default false
          */
		  
			'commands_mode'                    => false,
			
		/**
          * @name There you can change bot nickname
          * @default mBot Premium
          */
		  
			'bot_name'                         => 'Administrator',
		
		/**
          * @name Channel ID where bot enter (false - disable / id - enable)
          * @default false
          */
		
			'move_to_channel'                  => 11
		 
];
$config[3]['server'] = [
		/**
         * This is a checksum done edit this.
         * @default false
         */
			'checksum' => $checksum,
			
];
$config[3]['options']    = [
	
	    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_plugins_and_events_system' => true,
			
		/**
         * @name Enable/Disable mysql system
         * @default true
         */
		
			'enable_database' 				   => true,
			
		/**
         * @name The folder name from the events and plugins
         * @default FirstInstance
         */	
			
			'folder_name' 					   => 'SecondInstance',
			
		/**
         * @name Bot idle time before do next tasks
         * @default 1
         */	
		 
			'idle_seconds'                     => 5,
			
			    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_commands_system' => false
];
	
$config[3]['db'] = [

	'host'                        => $host,
	'user'                		  => $user,
	'pass'                        => $pass,
	'name'                        => $name
		 
];
	
$config[3]['plugins'] = [

		/**
         * @name Dosabled plugins
         * @format 'simplePlugin'
         */
		 
			'ignored_plugins' => ['autoRegister'], 

		/**
         * @name Specyfic plugin configurations
         */		
			
			'plugins_configs' => [
				'badNicknames' => [
					'foul_words' => ['shit', 'PGC24', 'pgc24', 'teamspeakuser', 'mareczin', 'dópa', ' jd', ' JD', 'JD100', 'jd100', 'k*rwa', 'K*RWA', 'KÓRWA', 'kórwa', 'kurwa', 'chój', 'huj', 'cipa', 'pierdolony', 'chuj', 'jebac', 'jebać', 'dziwka', 'kutas', 'CHUJ', 'Szmata' ,'Pizda' ,'PIZDA' ,'Pierdol Się' ,'Pierdol sie' ,'PIERDOL SIĘ' ,'jebać adminów' ,'JEBAĆ ADMINÓW' ,'Jebać Administracje' ,'Chuj' ,'KURWA' ,'shit' ,'kurwa' ,'huj' ,'cipa' , 'chuj' , 'dziwka' , 'kutas', 'CHUJ', 'Szmata', 'Pizda' ,'PIZDA' ,'Pierdol Się' ,'Pierdol sie' ,'PIERDOL SIĘ' ,'Jebać Adminów', 'JEBAĆ ADMINÓW', 'Jebać Administracje', 'Chuj', 'KURWA', 'pento', 'Administrator', 'Admin', 'ssij', 'cwel', 'cwele', 'pizda', 'spierdalaj' ,'wypierdalaj', 'serwer', '[]', 'kurwiszon', 'skurwysyn', 'ciota', 'root', 'SA', '[Ts Administrator]','TeamSpeakUser','fubu','JP armia','ROOT','Admin', '.pl','Administrator', 'Admin', 'serveradmin', 'server admin', 'query', 'queryadmin', 'query admin', 'serwer', 'server', 'serweradmin', 'serwer admin', 'owner', 'root', '.com', '.eu', '.org', '.net', '.com.pl', 'kurwa', 'Support Admin','Manager Admin', 'Public Admin', 'Administarto', 'http:'], /** Zle nicki **/
					'groups_ignore' => [287], // Ignorowane grupy
					'nickname_regular' => ''			
				],	
				
				'noAfk' => [
					'afk_channel_id' => 37, // Kanał na który ma przenieść.
					'clidb_ignore' => [], // Ignorowani klienci (Client_Database_ID)
					'check_channels_id' => [], // Id kanałów gdzie ma tylko sprawdzać.
					'groups_ignore' => [287,301,317,35,37,38], // Ignorowane grupy
					'move_message' => false // Wiadomośc po przeniesieniu
				],	
				
				'autoRegister' => [
					'groups' => [218], // Grupę, którą ma dodac.
					'groups_ignore' => [171, 169, 172, 173, 218, 220], // Ignorowane grupy
					'time' => 30 * 60 // Po jakim czasie ma ją nadać domyślnie 1 godzina.
				],
				
				'groupLimit' => [
					'groups' => [287,301,302,213,317,218,35,219,37,220,38,221,23,24,25,26,214,27,215,216,223,127,202,128,124,129,178,184,157,201,29,33,125,185,126,123,156,32,79,204,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100,101,194,196,195,197,198], // Ignorowane grupy
					'limit' => 7, // Limit grup
				],
				
				'mvGrToChfCh' => [
					/**
						Wydarzenie służące do przenoszenia użytkownika z danego kanału z danej grupy na określony w konfiguracji kanał.
						Informacje:
							[*] 'isOnChannel' 	- Tutaj wpisujemy kanał, z którego ma wrzucać.
							[*] 'isInGroup'   	- Tutaj wpisujemy id grupy, w której musi być dany użytkownik.
							[*] 'moveToChannel' - Tutaj wpisujemy id kanału na który ma przerzucić danego usera.
						
						Dodawanie nowego rekordu:
							Aby dodać kolejny rekord wystarczy skopiować to:
							numer => array('isOnChannel' => 0, 'isInGroup' => 0, 'moveToChannel' => 0),
					**/
					'list' => [
						1 => ['isOnChannel' => 36, 'isInGroup' => 79, 'moveToChannel' => 94],
					]
				],
			]
];
	
$config[3]['events'] = [
		/**
         * @name Dosabled events
         * @format 'simpleEvent'
         */
		
			'ignored_events' => ['musicChannel', 'clientLevels', 'musicSinus', 'musicInformation', 'freeChannelseng', 'randomGroup'],
		
		
		/**
         * @name Specyfic events time configuration
         */	
		
			'events_executes' => [
			
				'cleanup' => ['seconds' => 0, 'minutes' => 5, 'hours' => 0, 'days' => 0],
				
				'vipGroup' => ['seconds' => 1,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'vipGroupRemove' => ['seconds' => 1,'minutes' => 0,'hours' => 0,'days' => 0],

				'karya' => ['seconds' => 5,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'karymikroperm' => ['seconds' => 5,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'weryf2' => ['seconds' => 5,'minutes' => 1,'hours' => 0,'days' => 0],
				
				'musicChannel' => ['seconds' => 10,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'getChannel' => ['seconds' => 10,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'freeChannels' => ['seconds' => 1,'minutes' => 6,'hours' => 0,'days' => 0],
				
				'freeChannelseng' => ['seconds' => 1,'minutes' => 6,'hours' => 0,'days' => 0],
				
				'userPlatform' => ['seconds' => 35,'minutes' => 0,'hours' => 0,'days' => 0],
				
				'clientLevels' => ['seconds' => 0, 'minutes' => 5, 'hours' => 0, 'days' => 0],
				
				'awardsSystem' => ['seconds' => 1, 'minutes' => 10, 'hours' => 0, 'days' => 0],
				
				'newUsersToday' => ['seconds' => 0, 'minutes' => 2, 'hours' => 0, 'days' => 0],
				
				'randomGroup' => ['seconds' => 1, 'minutes' => 7, 'hours' => 0, 'days' => 0],
				
				'checkvip7' => ['seconds' => 1, 'minutes' => 1, 'hours' => 0, 'days' => 0],
				
				'checkvip14' => ['seconds' => 1, 'minutes' => 1, 'hours' => 0, 'days' => 0],
				
				'checkvip30' => ['seconds' => 1, 'minutes' => 1, 'hours' => 0, 'days' => 0],
				
				'Partners' => ['seconds' => 30, 'minutes' => 0, 'hours' => 0, 'days' => 0],

				'zmiany' => ['seconds' => 1, 'minutes' => 5, 'hours' => 0, 'days' => 0],				
				
				'musicInformation' => ['seconds' => 20, 'minutes' => 0, 'hours' => 0, 'days' => 0],
				
				'youtubeInfo' => ['seconds' => 10, 'minutes' => 3, 'hours' => 0, 'days' => 0],
			],
			
			
		/**
          * @name Specyfic event configurations
          */	
			
			'events_configs' => [
				
				'vipGroup' => [
				/*
					Automatyczne nadawanie rangi gildii.
					
					Domyślnie:
					- 'onClientAreOnChannel' - tutaj wpisujemy wszystkie id kanałów,
					- 'groups' - tutaj wpisujemy id kanału = id rangi, którą ma nadać,
					- 'all_groups' - tutaj wpisujemy id wszystkich grup.
				*/
					'onClientAreOnChannel' => [393,395,608,2411,2112,2175,2743,2796,2815,2852], 
						'groups' => [
							393 => [32], //vip1
							395 => [79], //vip2
							608 => [204], //vip3
							2411 => [307], //premium2
							2175 => [315], //vip5
							2112 => [309], //premium1
							2743 => [324], //premium3
							2796 => [335], //premium4
                            2815 => [336], //premium5
							2852 => [337], //premium6
						],
					'all_groups' => [32,79,204,307,309,315,324,335,336,337],
				],

				'vipGroupRemove' => [
				/*
					Automatyczne nadawanie rangi gildii.
					
					Domyślnie:
					- 'onClientAreOnChannel' - tutaj wpisujemy wszystkie id kanałów,
					- 'groups' - tutaj wpisujemy id kanału = id rangi, którą ma nadać,
					- 'all_groups' - tutaj wpisujemy id wszystkich grup.
				*/
					'onClientAreOnChannel' => [394,396,609,2412,2113,2176,2744,2797,2816,2853], 
						'groups' => [
							394 => [32], //vip1
							396 => [79], //vip2
							609 => [204], //vip3
							2412 => [307], //premium2
							2176 => [315], //vip5
							2113 => [309], //premium1
							2744 => [324], //premium3
							2797 => [335], //premium4
                            2816 => [336], //premium5	
                            2853 => [337], //premium6									
						],
					'all_groups' => [32,79,204,307,309,315,324,335,336,337],
				],
				
				'userPlatform' => [
					'mobile_group' => 271, // W przypadku gdy klient jest zalogowany na IOS lub Androdzie otrzymuje tą grupę.
				],
				
				'musicInformation' => [
					'mainInformation' => [
						'host' => 'http://127.0.0.1:8087',
						'login' => 'admin',
						'password' => '',
						'instance' => '3ee8d707-f8bd-4ffa-9437-9a9150176bb7',
						'database_id' => 1364,
						'youtube' => false
					],
					'channels' => [
						'description' => '[size=10]Last songs played on this section:[/size]\n[center][history][/center]\n\n',
						'mainChannel' => 82,
						'others' => [
							'author' => [
								'format' => 'Autor: [author]',
								'channel' => 85
							],
							'title' => [
								'format' => 'Tytuł: [title]',
								'channel' => 84
							]
						]
					]
				],
				
				'freeChannels' => [
				/*
					freeChannels - Darmowe kanały, wpisuje tutaj wolne kanały jak i te, które zostaną usunięte danego dnia.
				*/
					'channel_pid' => 103, // Sekcja kanałów prywatnych
					'write_channel' => 100, // Kanał gdzie ma wpisywać opis.
					'channel_id2' => 100, // Kanał gdzie ma wpisywać nazwę
					'channel_name' => 'Kanałów wolnych: [freeChannels]', // Nazwa kanału
					'top_desc' => '[size=12][b]Kanały dostępne:[/b] ',
					'end_desc' => '[/size]\n[hr][right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]',
				],

				'freeChannelseng' => [
				/*
					freeChannels - Darmowe kanały, wpisuje tutaj wolne kanały jak i te, które zostaną usunięte danego dnia.
				*/
					'channel_pid' => 103, // Sekcja kanałów prywatnych
					'write_channel' => 1062, // Kanał gdzie ma wpisywać opis.
					'channel_id2' => 1062, // Kanał gdzie ma wpisywać nazwę
					'channel_name' => '● Free channels: [freeChannels]', // Nazwa kanału
					'top_desc' => '[size=12][b]Channels Available:[/b] ',
					'end_desc' => '[/size]\n[hr][right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]',
				],
				
				'getChannel' => [
				/*
					getChannel - automatyczne nadawanie kanału po wejściu na określony kanał.
				*/
					'channels_section' => 103, // Sekcja kanałów prywatnych
					'need_groups' => [23,24,215,216], // Potrzebne grupy do otrzymania kanału
					'channel_num_regex' => '/(.*)\.(.*)/', // regex nazwy kanału
					'channel_admin_group_id' => 14, // ID grupy, która ma nadać
					'pl_groups' => array(23, 24), // Potrzebne grupy do otrzymania kanału
					'default_subchannels' => 3, // Domyślna ilość podkanałów
					'max_subchannels' => 3, // Maksymalna ilość podkanałów
					'channel_codec' => 4,
					'channel_codec_level' => 10,
					'onClientAreOnChannel' => [27,1028], // ID kanału, gdy na niego wejdziemy otrzymamy kanał.
				],
				
				'clientLevels' => [
					/*
						clientLevels - System leveli względem Twojej aktywności
					*/
					'output' => '[center][size=11]TOP [count]\n Największy poziom:[/size][/center]\n\n',
					'numbers_of_records' => 10, // Ilość rekordów wyświetlanych
					'end_output' => '\n[hr][right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]',
					'write_channel' => 251, // Kanał gdzie ma wpisywać
					'cache_path' => '/home/mbot/cache/',
					'need_group' => [106, 107, 109], // Grupy potrzebne do nadawania
					'groups_ignore' => [105], // Ignorowane grupy
					'levels' => [
						[112, 10], //LVL 1
						[113, 30 * 60], //LVL 2
						[114, 3 * 60 * 60], //LVL 3
						[115, 6 * 60 * 60], //LVL 4
						[116, 9 * 60 * 60], //LVL 5
						[117, 12 * 60 * 60], //LVL 6
						[118, 15 * 60 * 60], //LVL 7
						[119, 18 * 60 * 60], //LVL 8
						[120, 21 * 60 * 60], //LVL 9
						[121, 24 * 60 * 60], //LVL 10				
					],
					'interval' => 5 * 60, // Co jaki czas ma dodawać czas
					'ignore_idle_time' => 15 * 60, // Czas po którym nie jest dodawany czas
				],
				
				'awardsSystem' => [
				/*
					awardsSystem - System osiągnięc.
				*/
					'need_group' => [23, 24], // Grupy potrzebne do brania udziału.
					'del_group1' => 213, // friend.
					'groups_ignore' => [287,301,317,35,37,38], // Ignorowane grupy
					'totalClientsConnections' => [
						'status' => true, // Status
						'section_group' => 21, // Id grupy głównej np. Osiągnięcia ilość połączeń:
						'connections' => [
							[320, 500], // Grupa, ilość połączeń
							[318, 1000] //pamietaj o przecinku!
						],
					],
					'timeSpent' => [
						'status' => true, // Status
						'section_group' => 128, // Id grupy głównej np. Osiągnięcia ilość połączeń:
						'time' => [
							[320, 240], // Grupa, czas w godzinach
							[318, 720]
						],
					]
				],
				'newUsersToday' => [
				/*
					newUsersToday - Lista nowych użytkowników dziś
				*/
					'channel_name' => '● Nowi użytkownicy: [count]', // Nazwa kanału
					'top_desc' => '[size=10] Ostatnio dołączyli:[/size][size=9][list]\n',
					'end_desc' => '[/list][hr][/size][right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]',
					'write_channel' => 710, // Kanał gdzie ma wypisywać
					'need_groups' => [23,24,215,216], // Grupy potrzebne do sprawdzania
				],
				
				'randomGroup' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot1/cache/', 
					'need_groups' => [23,24,215,216], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [202,25,26,27,223,8], // Ignorowane grupy
					'add_group' => 202, // ID grupy, która ma nadać
					'group_time' => 1 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				
				'checkvip7' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot1/cache/', 
					'need_groups' => [23,24,215,216], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [202,25,26,27,223,8], // Ignorowane grupy
					'add_group' => 127, // ID grupy, która ma nadać
					'group_time' => 7 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'checkvip14' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot1/cache/', 
					'need_groups' => [23,24,215,216], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [202,25,26,27,223,8], // Ignorowane grupy
					'add_group' => 128, // ID grupy, która ma nadać
					'group_time' => 14 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'checkvip30' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot1/cache/', 
					'need_groups' => [23,24,215,216], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [202,25,26,27,223,8], // Ignorowane grupy
					'add_group' => 124, // ID grupy, która ma nadać
					'group_time' => 30 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'karya' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot/cachekary/', 
					'need_groups' => [156], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [157,287,301,317,35,37,38], // Ignorowane grupy
					'add_group' => 157, // ID grupy, która ma nadać
					'r_group' => 156, // ID grupy, która ma nadać
					'group_time' => 7 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'karymikroperm' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot/cachekary/', 
					'need_groups' => [311], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [184,287,301,317,35,37,38], // Ignorowane grupy
					'add_group' => 184, // ID grupy, która ma nadać
					'r_group' => 311, // ID grupy, która ma nadać
					//'group_time' => 7 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'weryf2' => [
				/*
					randomGroup - Losowanie rangi, nadawanie jej użytkownikowi na 1 dzień, później automatyczne zdejmowanie.
				*/
					'cache_path' => '/home/mbot/cachekary/', 
					'need_groups' => [23,24], // ID grup, które sa potrzebne do brania udziału min. 1
					'ignore_groups' => [214], // Ignorowane grupy
					'add_group' => 214, // ID grupy, która ma nadać
					'r_group' => 314, // ID grupy, która ma nadać
					'group_time' => 7 * 24 * 60 * 60, // Na jaki okres jest grupa
					'channels' => [
						'winner' => [
							'channel_name' => '● Ostatnio wylosowany: [winner_nick]', // Nazwa kanału informacyjnego
							'channel_cid' => 702, // Id kanału informacyjnego
							'channel_description' => [
								'start' => '\n [center][size=15][b]Loteria VIP[/size][/center]\n\n',
								'end' => '\n[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
							],
						],
					],
				],
				
				'Partners' => [
				/*
					Partners - Automatycznie wpisywanie i losowanie partnera w kanał ze zdefiniowaną nazwą jak i opisałem kanału.
					
					Domyślnie:
						0 => array(
							'name' => 'Nazwa kanłu',
							'desc' => 'Opis'
						),
				*/
					'partners' => [
						0 => [
							'name' => '● K-Scripts.eu - Usługi Programistyczne',
							'desc' => '[center][size=15][b]Partnerzy[/b]
							 OnlineSpeak.eu[/center]
							[size=10][b]K-scripts[/b] to działalność założona przez zdolnego programistę i developera. Ambicję i ciężką pracę postanowiono przekuć w firmę, która będzie kontynuowała tradycję dokładności, rzetelności i pomysłowości.[/size]
							[size=10]
							Postawowe informacje:
							[list]
							[*] Link do strony: [b][url=http://k-scripts.eu/]Przejdź[/url][/b]
							[*] Link do FanPage: [b][url=https://www.facebook.com/K-Scriptseu-171013159931042/]Przejdź[/url][/b]
							[/size]
							[hr]
							[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 24.0)[/url][/right]'
						],
						1 => [
							'name' => '● BlazingFast.io',
							'desc' => '[center][size=15][b]Partnerzy[/b]
							 OnlineSpeak.eu[/center]
							[size=10][b]BlazingFast.io[/b] We have created the fastest and most convenient cloud technology to help you easily and more efficiently manage your infrastructure. We are using only the latest high-performance SSD Hard Drives in all our servers, that will let your application run faster than ever before. We provide the best tools to control your virtual server in the cloud. We take your privacy very seriously! You can rest assured that your personal information such as IP and Email Address including files stored in our system will be kept in strict confidence and we will never sell, rent or otherwise distribute them.If you anyways have questions, please feel free to contact our 24/7 support and we will be more than glad to help you with all your questions about our products.
							[/size]
							[hr]
							[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 23.1)[/url][/right]'
						],
						2 => [
							'name' => '● HosTeam.pl',
							'desc' => '[center][size=15][b]Partnerzy[/b]
							 OnlineSpeak.eu[/center]
							[size=10]Nasza firma istnieje na rynku od 2009r. W ciągu tych lat stale rozwijamy i poszerzamy ofertę proponowanych dla Was usług. Ciągle doskonalimy nasze usługi po to aby jak najlepiej realizować potrzeby naszych klientów.[/size]
							[size=10]
							Postawowe informacje:
							[list]
							[*] Link do strony: [b][url=https://hosteam.pl/pl]Przejdź[/url][/b]
							[*] Link do FanPage: [b][url=https://www.facebook.com/profile.php?id=120999637943831&fref=ts]Przejdź[/url][/b]
							[/size]
							[hr]
							[right][size=9]Wygenerowane przez: [b][url=http://K-Scripts.eu/?teamspeak]MBOT (Wersja: 23.1)[/url][/right]'
						],
					],
					'channel' => 990
				],
				'zmiany' => [
				/*
					Partners - Automatycznie wpisywanie i losowanie partnera w kanał ze zdefiniowaną nazwą jak i opisałem kanału.
					
					Domyślnie:
						0 => array(
							'name' => 'Nazwa kanłu',
							'desc' => 'Opis'
						),
				*/
					'partners' => [
						0 => [
							'name' => '[cspacer]» Darmowe Kanały «',
							'desc' => ''
						],
						1 => [
							'name' => '[cspacer]» Kanały Premium od 10 osób+ «',
							'desc' => ''
						],
						2 => [
							'name' => '[cspacer]» Kanały SVIP od 8 osób+ «',
							'desc' => ''
						],
						3 => [
							'name' => '[cspacer]» Kanały VIP od 6 osób+ «',
							'desc' => ''
						],
					],
					'channel' => 2117
				],
				'youtubeInfo' => [
					'channels' => [
						0 => [
							'youtube_id' => 'UCXYse7NyqjxhRPEaG9xNlXw',
							'channel_name' => '[rspacer]KondzioTVStudio: [number]',
							'channel_id' => 2746
						],
					]
				]	
			],
];
/** Bot id 4 configuration **/	
$config[4]['connection'] = [
		/** 
         * @name TeamSpeak3 Server IP Adress
         * @format 0.0.0.0
         */
		 
			'server_ip'                        => $serverip,
			
		/**
         * @name TeamSpeak3 Server Query Port
         * @default 45555
         */	
			'server_query_port'                => $port,
			
		/**
         * @name TeamSpeak3 Server ID
         * @default 1
         */	
		 
			'server_id'                        => 1,
			
		/**
          * @name TeamSpeak3 Server Query Login
          * @default serveradmin
          */
		  
			'server_query_login'               => 'serveradmin',
			
		/**
          * @name TeamSpeak3 Server Query Password
		  */	
		  
			'server_query_password'            => $querypass,
			
			
		/**
          * @name Enable/Disable commands mode in TeamSpeak3 Query [Important: Look at the configuration config > options > enable_commands_system]
          * @default false
          */
		  
			'commands_mode'                    => false,
			
		/**
          * @name There you can change bot nickname
          * @default mBot Premium
          */
		  
			'bot_name'                         => 'Pobieracz',
		
		/**
          * @name Channel ID where bot enter (false - disable / id - enable)
          * @default false
          */
		
			'move_to_channel'                  => 11
		 
];
$config[4]['server'] = [
		/**
         * This is a checksum done edit this.
         * @default false
         */
			'checksum' => $checksum,
			
];
$config[4]['options']    = [
	
	    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_plugins_and_events_system' => true,
			
		/**
         * @name Enable/Disable mysql system
         * @default true
         */
		
			'enable_database' 				   => false,
			
		/**
         * @name The folder name from the events and plugins
         * @default FirstInstance
         */	
			
			'folder_name' 					   => 'FourthInstance',
			
		/**
         * @name Bot idle time before do next tasks
         * @default 1
         */	
		 
			'idle_seconds'                     => 0,
			
			    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_commands_system' => false
		
];
/** end of mysql configuartion **/	
	
	
$config[4]['plugins'] = [
	
		/**
         * @name Dosabled plugins
         * @format 'simplePlugin'
         */
	
			'ignored_plugins' => ['getData'], 
			
		/**
         * @name Specyfic plugin configurations
         */	

			'plugins_configs' => [
				'getData' => [
					'file' => '/var/www/entrone.eu/hosting/banner/cachefile', // Gdzie ma zapisywać dane
					'time' => 1 * 10 // Czas co jaki ma zapisywać pliki
				]
			]
];
	
$config[4]['events'] = [
	
		/**
         * @name Dosabled events
         * @format 'simpleEvent'
         */
	
			'ignored_events' => ['generatingBanner', 'channelStatisticsActive', 'chartsGenerator'],

		/**
         * @name Specyfic events time configuration
         */	
		
			'events_executes' => array(				
				
				'generatingBanner' => array('seconds' => 30, 'minutes' => 0, 'hours' => 0, 'days' => 0),
				'channelStatisticsActive' => array('seconds' => 0, 'minutes' => 30, 'hours' => 0, 'days' => 0),
				'chartsGenerator' => array('seconds' => 0, 'minutes' => 0, 'hours' => 1, 'days' => 0),
			),
			
		/**
          * @name Specyfic event configurations
          */
			
			'events_configs' => [
			
			
				'generatingBanner' => [
				/*
					generatingBanner - Automatyczne generowanie bannera.
				*/
					'admins_groups' => [105], // Id grup administracji
					'get_file_from' => '/home/mbot/assets/', // Ścieżka do katalogu z plikami
					'save_file_here' => '/var/www/', // Gdzie ma zapisać banner
					
				],
				'channelStatisticsActive' => [
					'cache_path' => '/home/mbot1/inc/cache/channels/',
					'check_section' => [103],
					'scan_hours' => '0-22',
					'minimum_period' => 7,
					'min_value' => 0,
					'channel_id' => 102,
					'ignored_channels' => []
				],
				'chartsGenerator' => [
                    'checker_type' => 'charts', 
                    'channel_id' => [2,94,599],
					'ignored_channels' => array(),
                ],
			]
];
/** end of adds configuration **/
/** Bot id 5 configuration **/
$config[5]['connection'] = [
		/** 
         * @name TeamSpeak3 Server IP Adress
         * @format 0.0.0.0
         */
		 
			'server_ip'                        => $serverip,
			
		/**
         * @name TeamSpeak3 Server Query Port
         * @default 45555
         */	
			'server_query_port'                => $port,
			
		/**
         * @name TeamSpeak3 Server ID
         * @default 1
         */	
		 
			'server_id'                        => 1,
			
		/**
          * @name TeamSpeak3 Server Query Login
          * @default serveradmin
          */
		  
			'server_query_login'               => 'serveradmin',
			
		/**
          * @name TeamSpeak3 Server Query Password
		  */	
		  
			'server_query_password'            => $querypass,
			
			
		/**
          * @name Enable/Disable commands mode in TeamSpeak3 Query [Important: Look at the configuration config > options > enable_commands_system]
          * @default true
          */
		  
			'commands_mode'                    => true,
			
		/**
          * @name There you can change bot nickname
          * @default mBot Premium
          */
		  
			'bot_name'                         => 'Informator',
		
		/**
          * @name Channel ID where bot enter (false - disable / id - enable)
          * @default false
          */
		
			'move_to_channel'                  => 11
		 
];
$config[5]['server'] = [
		/**
         * This is a checksum done edit this.
         * @default false
         */
			'checksum' => $checksum,
			
];
$config[5]['options']    = [
		
	    /**
         * @name Enable/Disable commands system in bot interface [Important: Look at the configuration config > connection > commands_mode]
         * @default false
         */
		 
			'enable_commands_system' => true,
			
			'enable_plugins_and_events_system' => false,
			
		/**
         * @name Enable/Disable mysql system
         * @default true
         */
		
			'enable_database' 				   => false,
			
		/**
         * @name Bot idle time before do next tasks
         * @default 1
         */	
		 
			'idle_seconds'                     => 1
		
];
$config[5]['commands'] = [
		/**
         * @name Disabled commands
         * @format 'simpleCommand'
         */
         
            'disable_commands' => ['chvip','chgvip','ch'],

        /**
         * @name Specyfic command configuration
         */
        
            'commands_configs' => [
         	    'ch' => [
					'groups' => [287],
					'channels_section' => 3379,
					'channel_num_regex' => '/(.*)\.(.*)/',
					'channel_admin_group_id' => 53,
                    'default_subchannels' => 0,
                    'max_subchannels' => 2,
					'channel_codec' => 2,
					'channel_codec_level' => 8,
					'help' => 'Komenda zakłada kanał w strefie prywatnej.',
					'usage' => '<numer użytkownika> [ilość podkanałów]'
				],
                'moveclient' => [
					'groups' => [287],
					'help' => 'Komenda przenosi użytkownika na Twój kanał.',
					'usage' => '<numer użytkownika>'
				],
                'gotoclient' => [
					'groups' => [287],
					'blocked_channels' => [],
					'help' => 'Komenda przenosi Cię na kanał użytkownika.',
					'usage' => '<numer użytkownika>'
				],
                'meeting' => [
					'groups' => [287],
					'move_groups' => [169, 171, 172, 173],
					'meeting_channel' => 7,
					'help' => 'Komenda przenosi wszystkich administratorów na określony kanał.',
					'usage' => ''
				],
                'adminsonline' => [
					'groups' => [287],
					'admin_groups' => [169, 171, 172, 173],
					'help' => 'Komenda wyświetla listę administratorów online.',
					'usage' => ''
				],
                'channellist' => [
					'groups' => [287],
					'help' => 'Komenda wyświetla listę kanałów.',
					'usage' => ''
				],
                'clientlist' => [
					'groups' => [287],
					'help' => 'Komenda wyświetla listę użytkowników wraz z dodatkowymi danymi.',
					'usage' => ''
				],
                'commands' => [
					'groups' => [287],
					'help' => 'Komenda wyświetla informacje o dostępnych komendach.',
					'usage' => ''
				],
                'memory' => [
					'groups' => [287],
					'help' => 'Komenda pokazuje aktualny stan używanej pamięci przez aplikacje.',
					'usage' => ''
				],
                'findclients' => [
					'groups' => [287],
					'help' => 'Komenda wyszukuje użytkownika którego nazwa zawiera frazę z parametru.',
					'usage' => '<filtr>'
				],
                'pwall' => [
					'groups' => [287],
					'help' => 'Komenda wysyła wiadomość prywatną do wszystkich użytkowników serwera o danej treści.',
					'usage' => '<wiadomość>'
				],
				'pwToGroup' => [
					'groups' => [287],
					'help' => 'Komenda wysyła wiadomość prywatną do wszystkich użytkowników w podanej grupie',
					'usage' => '<wiadomość>'
				],
				'pokeToGroup' => [
					'groups' => [287],
					'help' => 'Komenda wysyła poke do wszystkich użytkowników w podanej grupie.',
					'usage' => '<wiadomość>'
				], 
				'pwToAdmin' => [
					'groups' => [287],
					'admin_group' => array(169, 171, 172, 173),
					'help' => 'Komenda wysyła wiadomość prywatną do wszystkich adminów',
					'usage' => '<wiadomość>'
				],
				'pokeToAdmin' => [
					'groups' => [287],
					'admin_group' => array(287,301,317,35,37,38),
					'help' => 'Komenda wysyła poke do wszystkich adminów.',
					'usage' => '<wiadomość>'
				],
				'pokeall' => [
					'groups' => [287],
					'help' => 'Komenda wysyła poke do wszystkich użytkowników serwera.',
					'usage' => '<wiadomość>'
				],
				'bot' => [
					'groups' => [287],
					'help' => 'Komenda wysyła poke do wszystkich użytkowników serwera.',
					'usage' => '<wiadomość>'
				],
				'bingo' => [
					'groups' => [23,24,215,216],
					'help' => '',
					'usage' => ''
				],
				'trueOrfalse' => [
					'groups' => [171],
					'pytania' => [
						1 => [
							'typ' => 'Prawdziwe',
							'pytanie' => 'Przykładowe pytanie1'
						],
						2 => [
							'typ' => 'Fałszywe',
							'pytanie' => 'Przykładowe pytanie2'
						],
						3 => [
							'typ' => 'Fałszywe',
							'pytanie' => 'Przykładowe pytanie3'
						],
					],
					'help' => '',
					'usage' => '<wiadomość>'
				],
            ]
];
/** end of adds configuration **/
?>