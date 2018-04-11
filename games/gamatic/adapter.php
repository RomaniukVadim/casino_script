<?php

define ( 'CASINOENGINE',   true ) ;//  


require_once( '../../../engine/config/config_db.php' );
// оперделяем поля для работы с мускулом
define ( 'MY_TABLE_BANK',   'games_bank' ) ;// таблица банков 
define ( 'MY_BANK_NAME',    'name'       ) ;// название банка
define ( 'MY_BANK_SUMM',    'bank'       ) ;// сумма банка 
define ( 'MY_BANK_PROC',    'proc'       ) ;// процент (для совместимости со старыми версиями)
define ( 'MY_BANK_MAX',     'winmax'     ) ;// макмимальная сумма Win за 1 спин 
define ( 'MY_BANK_IN',      'income'     ) ;// ПРОЦЕНТ КОТОРЫЙ ЗАБИРАЕМ СЁБЕ  
define ( 'MY_BANK_BONUS',   'bonus'      ) ;// сумма бонуса 
define ( 'MY_BANK_BONUS2',  'bonus2'     ) ;// сумма второго бонуса 
define ( 'MY_BANK_BONREADY','bonusready' ) ;// сумма готовности выдачи бонуса
define ( 'MY_BANK_BONPROC', 'bonusproc'  ) ;// процент отчисляемый в банк бонуса 
define ( 'MY_BANK_JP',      'jackpot'    ) ;// сумма банка  JP
define ( 'MY_BANK_JPPROC',  'jpotproc'   ) ;// процент отчисляемый в банк  JP 
define ( 'MY_BANK_MODE',    'mode'       ) ;// настройки слота 
define ( 'MY_BANK_MODE2',   'mode2'      ) ;// остояние слота  
define ( 'MY_BANK_MODE3',   'mode3'      ) ;// функции слота 
define ( 'MY_BANK_MODE4',   'mode4'      ) ;// расширеные функции слота 
define ( 'MY_BANK_INCASH',  'incash'     ) ;// общий дохот слота                              
define ( 'MY_PUBLIC',       'ttuz'       ) ;// общий банк                                     
define ( 'MY_PARTNER',      'partnering' ) ;// общий банк                                     
//  0    1          2        3         4           5         6        7       8          9        10
// id  username  password  email  personaldata  wherepay  regdate  regip  accountsum  deposit  withdraw
//    11         12        13        14       15         16        17    18     19     20
// cps_summ  cps_proc  cps_bon  cps_friend  holdset  win_double  mode  mode2  mode3  mode4  
/*
id  login  pass  cash  cashin  cashout  cashfun  cashfunin  cashfunout
fun_date  email  date  check_mail  ip_reg  ip_last  admin_notes
operator_notes  status_message  login_block  login_number  pm_all  
pm_unread  status  key_reset  referer  cash_ref  cash_pending  cash_ref_withdrawn  
partner_blocked  cash_ref_total  hits  registers  holdset  win_double  mode  mode2  mode3  mode4  
*/                                                                                               
define ( 'MY_TABLE_PLAYERS','clients'    ) ;//  таблица юзеров                                 
define ( 'MY_USER_NUMID',   'id'         ) ;//  0 айдй                                           
define ( 'MY_USER_USERS',   'login'   ) ;//  1 юзер                                           
define ( 'MY_USER_PASS',    'pass'   ) ;//  2 пасс                                           
define ( 'MY_USER_EMAIL',   'email'      ) ;//  3 мыло                                           
define ( 'MY_USER_DATE',    'date'    ) ;//  6 дата реги                                      
define ( 'MY_USER_PREIP',   'ip_reg '     ) ;//  7 IP при реги                                      
define ( 'MY_USER_CASH',    'cash' ) ;//  8 баланс игрока                                  
define ( 'MY_USER_CASHIN',  'cashin'    ) ;//  9 ввод игрока                                    
define ( 'MY_USER_CASHOUT', 'cashout '  ) ;// 10 вывод игрока                                   
define ( 'MY_USER_CPS',     'cps_summ'   ) ;// 11 партнерские от привлеченных                                    
define ( 'MY_USER_CPS_PROC','cps_proc'   ) ;// 12 партнерские гарантир. списываем из банка
define ( 'MY_USER_CPS_ADD', 'cps_bon'    ) ;// 13 партнерские отдаем партнеру бонусом
define ( 'MY_USER_CPS_REF', 'cps_friend' ) ;// 14 кто привел 
define ( 'MY_USER_HOLD',    'holdset'    ) ;// 15 тут храним инфу о прошлом спине                
define ( 'MY_USER_WINDBL',  'win_double' ) ;// 16 удвоение                                       
define ( 'MY_USER_MODE',    'mode'       ) ;// 17 параметры спина                                
define ( 'MY_USER_MODE2',   'mode2'      ) ;// 18 состояние                                      
define ( 'MY_USER_MODE3',   'mode3'      ) ;// 19 состояние расширенное                          
define ( 'MY_USER_MODE4',   'mode4'      ) ;// 20 инфа о юзере                                        

define ( 'S_USER_DEMO_NAME',    'Visitor'    ) ;// имя демо юзера                                      
define ( 'S_USER_DEMO_BALANCE', '1000'       ) ;// стартовый баланс демо юзера                                      

define ( 'S_ENG_EXIT_LOGIN', '/?action=login' ) ;// путь выхода если нет авторизации                                      
define ( 'S_ENG_DIR_RETURN',  '/'             ) ;// путь выхода если нет авторизации                                      
define ( 'HTTP_VARS_USER',  'user'    ) ;// переменные                                       
define ( 'HTTP_VARS_MODE',  'mode'    ) ;// переменные                                        
define ( 'HTTP_VARS_GAME',  'game'    ) ;// переменные 

define ( 'MY_USER_DEMO',    'Visitor'        ) ;// имя демо юзера  - debricade                                      


define ( 'MY_TABLE_STATGAME','games_stats' ) ;// таблица статистики 
//define ( 'MY_TABLE_STATGAME_FUN','stat_game_fun' ) ;// таблица сбора статистики по демо играм
define ( 'MY_TABLE_STATGAME_FUN','games_stats' ) ;// таблица сбора статистики по демо играм
define ( 'MY_STATGAME_NUMID',   'id'     ) ;// айдй
define ( 'INSERT_STAT', true ) ;// разрешаем вставлять статистику

#пути к счетчикам
define ( 'ROOT_DIR', $_SERVER['DOCUMENT_ROOT'] ) ;// корень саита// root_dir_site( 'public_html', 1 ) 
if (!defined('MODULS')) define ( 'MODULS', 'mods' ) ;// путь к папке модулей

//define ( 'COUNTERS_GOOGLE',  ROOT_DIR.'/'.MODULS.'/google.php' ) ;// путь к счетчику гугла
//define ( 'COUNTERS_ANALYST', ROOT_DIR.'/games/counters.php'   ) ;// путь к счетчику статистики


?>