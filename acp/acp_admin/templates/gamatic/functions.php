<?php #::[ модуль определленых функций ]::#
//$table_players    =  "players"  ;
//$pole_username    =  "username" ;
//$pole_partnername =  "partner"  ;


// оперделяем поля для работы с мускулом
define ( "MY_TABLE_PLAYERS","players"    ) ;// таблица юзеров 
define ( "MY_USER_NUMID",   "id"         ) ;// 0  айдй
define ( "MY_USER_USERS",   "username"   ) ;// 1  юзер
define ( "MY_USER_PASS",    "password"   ) ;// 2  пасс 
define ( "MY_USER_EMAIL",   "email"      ) ;// 3  мыло
define ( "MY_USER_PRIVATE","personaldata") ;// 4  персональные данные
define ( "MY_USER_WHEREPAY","wherepay"   ) ;// 5  платежные данные
define ( "MY_USER_DATE",    "regdate"    ) ;// 6  дата реги
define ( "MY_USER_REGIP",   "regip"      ) ;// 7  ip при регистрации 
define ( "MY_USER_CASH",    "accountsum" ) ;// 8  баланс игрока 
define ( "MY_USER_CASHIN",  "deposit"    ) ;// 9  ввод игрока 
define ( "MY_USER_CASHOUT", "withdraw"   ) ;//10   вывод игрока 
define ( "MY_USER_CPS",     "cps_summ"   ) ;//11   партнерские отдаем партнеру
define ( "MY_USER_CPS_PROC","cps_proc"   ) ;//11   партнерские отдаем партнеру бонусом
define ( "MY_USER_CPS_ADD", "cps_bon"    ) ;//11   партнерские 
define ( "MY_USER_CPS_REF", "cps_friend" ) ;//11   партнерские 
define ( "MY_USER_HOLD",    "holdset"    ) ;//12   тут храним инфу о прошлом спине                
define ( "MY_USER_WINDBL",  "win_double" ) ;//13  удвоение                                       
define ( "MY_USER_MODE",    "mode"       ) ;//14  параметры спина                                
define ( "MY_USER_MODE2",   "mode2"      ) ;//15  состояние                                      
define ( "MY_USER_MODE3",   "mode3"      ) ;//16  состояние расширенное                          
define ( "MY_USER_MODE4",   "mode4"      ) ;//17  ip и время входа 
define ( "MY_USER_RIGHT",   "permision"  ) ;//18  права 
//  1    2     3                                                    10                                               17
//name bank proc winmax income bonus bonus2 bonusready bonusproc bonusmode jackpot jpotproc mode mode2 mode3 mode4 incash 
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
define ( 'MY_PARTNER',      'partnering' ) ;// партнерский банк                                     

define ( "MY_TABLE_PARTNER", "partner"   ) ;// таблица партнерки
define ( "MY_PARTNER_PARTN", "cps"       ) ;//0 рефовод
define ( "MY_PARTNER_USER",  "user"      ) ;//1 реферал
define ( "MY_PARTNER_DATE",  "data"      ) ;//2 дата реги реферала
define ( "MY_PARTNER_CASH",  "usd"       ) ;//3 процент от суммы внесенной рефералом
//id  op_1  op_2  op_3  op_4  op_5  op_6  
define ( "MY_TABLE_IOPTIONS", "interface_options" ) ;// таблица настройки сайта, сообщений и т.п.
define ( "MY_IOPTIONS_MESS",  "id"      ) ;// айдй настройки <-что это???
define ( "MY_IOPTIONS_ID",    "id"      ) ;// айдй настройки 
define ( "MY_IOPTIONS_OP1",   "op_1"    ) ;// опция 1 
define ( "MY_IOPTIONS_OP2",   "op_2"    ) ;// опция 2 
define ( "MY_IOPTIONS_OP3",   "op_3"    ) ;// опция 3 
define ( "MY_IOPTIONS_OP4",   "op_4"    ) ;// опция 4 
define ( "MY_IOPTIONS_OP5",   "op_5"    ) ;// опция 5 
define ( "MY_IOPTIONS_OP6",   "op_6"    ) ;// опция 6
//  nameid  passwd  access  project_email  project_url  project_name  project_icq  project_phone  project_addr 
// project_license  mrh_login  mrh_pass1  mrh_pass2  cps_percent  paymail  regsend  zakmail  icq  cas_bon 
// wmid  wmz  wme  wmu  wmb  wmy  exchange_rate  other  
define ( "MY_TABLE_SETTINGS", "settings" ) ; // таблица основные настройки , админка
define ( "MY_SETTINGS_USER",  "nameid"   ) ; // имя аминистратора или кассира
define ( "MY_SETTINGS_PWD",   "passwd"   ) ; // пароль аминистратора или кассира
define ( "MY_SETTINGS_ACSSES","access"   ) ; // права доступа
define ( "MY_SETTINGS_PMAIL","project_email" ) ; // емэил
define ( "MY_SETTINGS_PURL", "project_url"   ) ; // 
define ( "MY_SETTINGS_PNAME","project_name"  ) ; // 
define ( "MY_SETTINGS_PICQ", "project_icq"   ) ; // 
define ( "MY_SETTINGS_PTEL", "project_phone" ) ; // 
define ( "MY_SETTINGS_PADDR","project_addr"  ) ; // 
define ( "MY_SETTINGS_PLSN","project_license") ; // 
define ( "MY_SETTINGS_PAYLOGIN","mrh_login"  ) ; // 
define ( "MY_SETTINGS_PAYPASS1","mrh_pass1"  ) ; // 
define ( "MY_SETTINGS_PAYPASS2","mrh_pass2"  ) ; // 
define ( "MY_SETTINGS_CPS","cps_percent" ) ; // % партнерка
define ( "MY_SETTINGS_PAYMAIL","paymail" ) ; // 
define ( "MY_SETTINGS_REGSEND","regsend" ) ; // 
define ( "MY_SETTINGS_OUTMAUL","zakmail" ) ; // 
define ( "MY_SETTINGS_ICQ",  "icq"       ) ; // 
define ( "MY_SETTINGS_PAYBONUS","cas_bon") ; // 
define ( "MY_SETTINGS_WMID", "wmid"      ) ; // 
define ( "MY_SETTINGS_WMZ",  "wmz"       ) ; // 
define ( "MY_SETTINGS_WME",  "wmE"       ) ; // 
define ( "MY_SETTINGS_WMU",  "wmU"       ) ; // 
define ( "MY_SETTINGS_WMB",  "wmB"       ) ; // 
define ( "MY_SETTINGS_WMY",  "wmy"       ) ; // 
define ( "MY_SETTINGS_EXCHRATE","exchange_rate" ) ; // основные настройки , админка курсы валют
define ( "MY_SETTINGS_OTHER", "other"    ) ; // основные настройки , админка прочие настройки
define ( "MY_SETTINGS_AMAIL","adm_email" ) ; // Мыло админа - нет такого поля уже
//id  username  data  time  summ  type_operations  systempay  flag 
define ( "MY_TABLE_STATPAY", "stat_pay"   ) ; // таблица статистики платежей
define ( "MY_STATPAY_ID",    "id"         ) ; //0 ID заказа платежей
define ( "MY_STATPAY_USER",  "username"   ) ; //1 юзер совершивший платеж
define ( "MY_STATPAY_DATA",  "data"       ) ; //2 дата операции
define ( "MY_STATPAY_PAY",   "pay"        ) ; //3 дата операции в валюте пользователя
//define ( "MY_STATPAY_TIME",  "time"       ) ; //3 время операции
define ( "MY_STATPAY_SUMM",  "summ"       ) ; //4 сумма операции в текущей валюте проекта
define ( "MY_STATPAY_TO","type_operations") ; //5 тип операции
define ( "MY_STATPAY_SP",    "systempay"  ) ; //6 систама платежей/кошелек
define ( "MY_STATPAY_FLAG",  "flag"       ) ; //7 флаг состояния платежа

// id 	login 	cash 	rekvizit 	sumout 	datein 	flag 	dateout
define ( "MY_TABLE_ORDER",    "withdraw"  ) ;// таблица заказов платежей
define ( "MY_ORDER_ID",       "id"        ) ;// Ай Ди операции
define ( "MY_ORDER_USER",     "login"     ) ;// Имя пользователя совервшившего операцию
define ( "MY_ORDER_BALANCE",  "cash"      ) ;// баланс на момент совершения операции
define ( "MY_ORDER_PAYMENT",  "rekvizit"  ) ;// платежный реквизит
define ( "MY_ORDER_PAYOUT",   "payout"    ) ;// платежный реквизит
//define ( "MY_ORDER_TIMESTAMP","time"     ) ;// отпечаток времени
define ( "MY_ORDER_SUM",      "sumout"    ) ;// сумма операции
define ( "MY_ORDER_APPO", "appointment"   ) ;// П/С Куда выплачивать
define ( "MY_ORDER_IN",       "datein"    ) ;// время заказа
define ( "MY_ORDER_FLAG",     "flag"      ) ;// флаг состояни я о\операции
define ( "MY_ORDER_OUT",      "dateout"   ) ;// время обработки

//id  username  oldpass  time  codes  marker  flag 
define ( "MY_TABLE_FORGOT",  "forgotten" ) ;// таблица восттановленния паролей
define ( "MY_FORGOT_ID",     "id"        ) ;//  ID записи
define ( "MY_FORGOT_TIME",   "time"      ) ;//  Штамп времени
define ( "MY_FORGOT_USER",   "username"  ) ;//  имя юзера
define ( "MY_FORGOT_COD",    "codes"     ) ;//  код подтверждения
define ( "MY_FORGOT_KEY",    "marker"    ) ;//  ключ
define ( "MY_FORGOT_FLAG",   "flag"      ) ;//  флаг состояния
//0    1     2      3      4      5     6    7 
//id  data  vrem  login  balans  stav  win  game  
define ( "MY_TABLE_STATGAME", "stat_game") ;// таблица игр
define ( "MY_STATGAME_ID",    "id"       ) ;// ID # игры 
define ( "MY_STATGAME_DATA",  "data"     ) ;// дата спина игры
define ( "MY_STATGAME_TIME",  "vrem"     ) ;// Время спина игры 
define ( "MY_STATGAME_USER",  "login"    ) ;// Логин игрока 
define ( "MY_STATGAME_CASH",  "balans"   ) ;// Баланс игрока до спина  
define ( "MY_STATGAME_BET",   "stav"     ) ;// Ставка игрока 
define ( "MY_STATGAME_WIN",   "win"      ) ;// Выигрыщ игрока 
define ( "MY_STATGAME_GAME",  "game"     ) ;// Название игры 

define ( "MY_TABLE_STATADM", "stat_admin") ;// таблица статистики админки
define ( "MY_STATADM_ID",            "id") ;// id статистики 
define ( "MY_STATADM_IP",            "ip") ;// ip захода
define ( "MY_STATADM_TIME",       "times") ;// штамп времени

//slotlist_setting  id  amount  folder  lng  btngm_w  btngm_h  img_w  img_h  mode  hz 
// далбицца настройки слот-листа
define ( "MY_TABLE_SLOTLISTSET", "slotlist_setting") ;// таблица настройки списка слотов
define ( "MY_SLOTLISTSET_ID",    "id"     ) ;// Название настройки
define ( "MY_SLOTLISTSET_COLVO", "amount" ) ;// кол-во ячеек на стр.
define ( "MY_SLOTLISTSET_PATH",  "folder" ) ;// где лежит все добро
define ( "MY_SLOTLISTSET_LNG",   "lng"    ) ;// язик
define ( "MY_SLOTLISTSET_BTNW",  "btngm_w") ;// размер кнопки W
define ( "MY_SLOTLISTSET_BTNH",  "btngm_h") ;// размер кнопки H
define ( "MY_SLOTLISTSET_SIZEW", "img_w"  ) ;// размер ячейки W
define ( "MY_SLOTLISTSET_SIZEH", "img_h"  ) ;// размер ячейки H
define ( "MY_SLOTLISTSET_MODE",  "mode"   ) ;// Мода
define ( "MY_SLOTLISTSET_HZ",    "hz"     ) ;// под разные нужды

// slotlist id  slot  images  size_w  size_h  title  alt  ahref  stake_1  stake_2  stake_3  send  run  
define ( "MY_TABLE_SLOTLIST", "slotlist" ) ; // таблица списка слотов
define ( "MY_SLOTLIST_ID",    "id"       ) ; //0  ID-Приоретет Slota
define ( "MY_SLOTLIST_UID",   "uid"      ) ; //1 UID "личный номер" Slota
define ( "MY_SLOTLIST_SLOT",  "slot"     ) ; //2 Слот
define ( "MY_SLOTLIST_IMAGE", "images"   ) ; //3 где лежит картинко
define ( "MY_SLOTLIST_SIZEW", "size_w"   ) ; //4 размер w
define ( "MY_SLOTLIST_SIZEH", "size_h"   ) ; //5 размер H
define ( "MY_SLOTLIST_TITLE", "title"    ) ; //6 title
define ( "MY_SLOTLIST_ALT",   "alt"      ) ; //7 alt
define ( "MY_SLOTLIST_HREF",  "ahref"    ) ; //8 Подпись ссылки
define ( "MY_SLOTLIST_MIN1",  "stake_1"  ) ; //9 ставка мин 1
define ( "MY_SLOTLIST_MIN2",  "stake_2"  ) ; //10ставка мин 2
define ( "MY_SLOTLIST_MIN3",  "stake_3"  ) ; //11 ставка мин 3
define ( "MY_SLOTLIST_SEND",  "send"     ) ; //12 запуск
define ( "MY_SLOTLIST_CAT",   "cathegory") ; //13 Категория слота
define ( "MY_SLOTLIST_TYPE",  "type"     ) ; //14 Производитеть (торговая марка)
define ( "MY_SLOTLIST_RUN",   "rating"   ) ; //15 рейтинг слота
// id 	data 	image 	text   
define ( "MY_TABLE_NEWS",      "news"    ) ; // таблица событий
define ( "MY_NEWS_ID",         "id"      ) ; // id списка
define ( "MY_NEWS_TIME",       "data"    ) ; // дата записи
define ( "MY_NEWS_SHORT",      "short"   ) ; // короткое сообщение
define ( "MY_NEWS_IMG",        "image"   ) ; // картинка
define ( "MY_NEWS_TXT",        "text"    ) ; // техт
define ( "MY_NEWS_STATUS",     "status"  ) ; // статус сообшения

// id 	mess     
define ( "MY_TABLE_ALERT",     "alert"   ) ; // таблица cообщений
define ( "MY_ALERT_ID",        "id"      ) ; // id cообщений
define ( "MY_ALERT_MESS",      "mess"    ) ; // само cообщение

// subscription id 	mess     
define ( "MY_TABLE_SUBSCRIPTION", "subscription" ) ; // таблица рассылки
define ( "MY_SUBSCRIPTION_ID",        "id"       ) ; // id cообщений
define ( "MY_SUBSCRIPTION_INFO", "questionnaire" ) ; // id cообщений
define ( "MY_SUBSCRIPTION_EMAIL",     "email"    ) ; // мыло 
define ( "MY_SUBSCRIPTION_STATUS",    "status"   ) ; // статус
define ( "MY_SUBSCRIPTION_UID",       "uid"      ) ; // id записи юзера
define ( "MY_SUBSCRIPTION_NOTE",      "note"     ) ; // примечание

// webmaster      
define ( "MY_TABLE_WEBMASTER",  "webmaster" ) ; // таблица вебмастера
define ( "MY_WEBMASTER_ID",     "id"        ) ; // id 
define ( "MY_WEBMASTER_USER",   "cps"       ) ; // логин 
define ( "MY_WEBMASTER_URL",    "url"       ) ; // урл саита
define ( "MY_WEBMASTER_STATUS", "status"    ) ; // статус урла
define ( "MY_WEBMASTER_CHECK",  "checker"   ) ; // контрольная сумма урла

// messages      
define ( "MY_TABLE_MESSAGES",  "messages" ) ; // таблица сообщений
define ( "MY_MESSAGES_ID",     "id"       ) ; // id 
define ( "MY_MESSAGES_DATE",   "timestamp") ; // дата время 
define ( "MY_MESSAGES_THEME",  "theme"    ) ; // Тема сообщения  
define ( "MY_MESSAGES_USER",   "user"     ) ; // логин 
define ( "MY_MESSAGES_MAIL",   "email"    ) ; // емаил для ответа
define ( "MY_MESSAGES_MESS",   "message"  ) ; // тело сообщения
define ( "MY_MESSAGES_STATUS", "status"   ) ; // статус 
define ( "MY_MESSAGES_SEND",   "send"     ) ; // ответ 

//
define ( "MY_TABLE_TAGS",    "tags" ) ; // таблица тегов 
define ( "MY_TAGS_ID",       "id"   ) ; // номер тега 
define ( "MY_TAGS_TYPE",     "type" ) ; // тип тега 
define ( "MY_TAGS_NAME",     "name" ) ; // имя тега( раздел ) 
define ( "MY_TAGS_EXTENDET", "ext"  ) ; // дополнительное имя тега (страница)
define ( "MY_TAGS_TELO",     "tag"  ) ; // сам тег 
// Navigation Bars      
define ( "MY_TABLE_NAVIGATION",  "navigation_bar" ) ; // таблица навигации
define ( "MY_NAVIGATION_ID",     "id"             ) ; // ID
define ( "MY_NAVIGATION_ORDER",  "regime"         ) ; // сортировко
define ( "MY_NAVIGATION_TYPE",   "type"           ) ; // тип записи
define ( "MY_NAVIGATION_DIRECT", "direction"      ) ; // Путь 
define ( "MY_NAVIGATION_BUTTON", "button"         ) ; // кнопко
define ( "MY_NAVIGATION_HOVER",  "button_hover"   ) ; // кнопко при наведении
define ( "MY_NAVIGATION_SCRIPT", "script"         ) ; // скрипт жаба
define ( "MY_NAVIGATION_ALT",    "text_alt"       ) ; // текст если нет картинки
define ( "MY_NAVIGATION_TITLE",  "text_title"     ) ; // титл
define ( "MY_NAVIGATION_TARGET", "target"         ) ; // тип ссылки
define ( "MY_NAVIGATION_NAME",   "name"           ) ; // имя кнопки
define ( "MY_NAVIGATION_TID",    "id_type"        ) ; // уникальный айди для типа записи 
define ( "MY_NAVIGATION_STYLE",  "style"          ) ; // класс css
define ( "MY_NAVIGATION_W",      "width"          ) ; // ширина
define ( "MY_NAVIGATION_H",      "heigth"         ) ; // висота
//таблица платежных систем
define ( "MY_TABLE_PS",  "payment_operator" ) ;
define ( "MY_ID",        "id"               ) ;
define ( "MY_PS_PS",     "paysys"           ) ;
define ( "MY_PS_STATUS", "status"           ) ;
define ( "MY_PS_SITE",   "siteps"           ) ;
define ( "MY_PS_LOGO",   "logops"           ) ;
define ( "MY_PS_PAY",    "payps"            ) ;
define ( "MY_PS_DESC",   "description"      ) ;
define ( "MY_PS_PROC",   "perc"             ) ;
define ( "MY_PS_RATE",   "rates"            ) ;
define ( "MY_PS_BULK",   "bulk"             ) ;
define ( "MY_PS_MAXLEN", "maxlength"        ) ;
define ( "MY_PS_TIT",    "titl"             ) ;
define ( "MY_PS_REMARK", "remark"           ) ;
define ( "MY_PS_NOTICE", "notice"           ) ;

#=================sis=================================================
define ( "S_INPUT_WALET", "Номер Z кошелька" ) ;// текст поле реквизитов вывода 
define ( "S_INPUT_SUMM",  "Введите сумму"    ) ;// текст поле суммя вывода 
define ( "S_INPUT_WIDRW", "USD"              ) ;// текст операционная валют 
define ( "S_INPUT_DEMO",  "FUN"              ) ;// текст операционная валют 
define ( "S_USER_DEMO_NAME",    "Visitor"    ) ;// имя демо юзера                                      
define ( "S_USER_DEMO_BALANCE", "1000"       ) ;// стартовый баланс демо юзера                                      
define ( "S_ADM_OPERATION", "operator"       ) ;// название кассира - операциониста                                      

define ( "MY_USER_DEMO",    "Visitor"        ) ;// имя демо юзера  - debricade                                      

define ( "P_PASS_LENGTH", 16                 ) ;// Длина авто пароля                                     
define ( "P_PASS_SIMBOL", "^0-9a-zA-Z@_.-"   ) ;// Допустимые символы а авто пароле                                     
define ( "IPVRF", "http://www.ip-ping.ru/ipinfo/?ipinfo=") ; // адрес проверки IP


$length = 16 ;

/* таблица партнерки 
pus  user  data  usd 
*/
/* функции для работы с мускулом _my_...........*/
function _my_conveter_dat_user ( $play=false ) // конвертер даты для юзеров
 {
             //  бля таблици юзерофф 
             ############# бля конвертер даты сцуко получилсо ###########################################
             /*##*/  // использовать при необходимости настроить нужные таблици
             /*##*/  $result = mysql_query ( "select * from ".MY_TABLE_PLAYERS ." ORDER BY `".MY_USER_NUMID ."`" ) ;
             /*##*/  //$result = mysql_query ( "select * from ".$table ." ORDER BY `".MY_USER_NUMID ."`" ) ;
             /*##*/  while ( $row = mysql_fetch_array ( $result ) )
             /*##*/  preg_match ( "|([0-9]{1,2}).([0-9]{1,2}).([0-9]{2})|i", $row[MY_USER_DATE], $regs ) ;
             /*##*/  // preg_match ( "|([0-9]{2}):([0-9]{2}):([0-9]{2})|i", $last_ent[1], $regs1 ) ;
             /*##*/  $timestamp = strtotime ( $regs[3]."-".$regs[2]."-".$regs[1]." ".date("H:i:s") ) ;
             /*##*/  //if ( isset ( $_POST['datecurent'] ) ) $timestamp = time () ;
             /*##*/  //if ( $timestamp == true ) $set = MY_NEWS_TIME ."='". $timestamp ."', " ;
             /*##*/ unset ( $regs ) ;
             /*##*/ if ( $timestamp == true ) //$last_ent[0]  MY_USER_DATE
             /*##*/  {
             /*##*/    if ( $play == true ) mysql_query("UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_DATE."='".$timestamp  ."' WHERE ".MY_USER_USERS."='".$row[MY_USER_USERS]."'");
             /*##*/   echo '$timestamp='.$timestamp."Дата= $regs[1].$regs[2].$regs[3]"."strftime=".strftime('%e.%m.%Y %T', $timestamp )." IP=".$last_ent[2] ."<br/>";
             /*##*/  }        
             ######## // конвертер ##################################################################
 
 }
function _my_conveter_dat_game ( $play=false ) // конвертер даты для статистики гаме
 {           //MY_STATGAME_DATA
             //MY_STATGAME_TIME
             ############# бля конвертер даты сцуко получилсо ###########################################
             /*##*/  // при использовании необходимо настроить нужные таблицы
             /*##*/  $result = mysql_query ( "select * from ".MY_TABLE_STATGAME ." ORDER BY `".MY_STATGAME_ID ."`" ) ;
             /*##*/  //$result = mysql_query ( "select * from ".$table ." ORDER BY `".MY_USER_NUMID ."`" ) ;
             /*##*/  while ( $row = mysql_fetch_array ( $result ) )
             /*##*/  {
             /*##*/   preg_match ( "|([0-9]{1,2}).([0-9]{1,2}).([0-9]{2})|i", $row[MY_STATGAME_DATA], $regs ) ;
             /*##*/   // preg_match ( "|([0-9]{2}):([0-9]{2}):([0-9]{2})|i", $last_ent[1], $regs1 ) ;
             /*##*/   $timestamp = strtotime ( $regs[3]."-".$regs[2]."-".$regs[1]." ".$row[MY_STATGAME_TIME] ) ;
             /*##*/   //if ( isset ( $_POST['datecurent'] ) ) $timestamp = time () ;
             /*##*/   //if ( $timestamp == true ) $set = MY_NEWS_TIME ."='". $timestamp ."', " ;
             /*##*/  
             /*##*/   if ( $timestamp == true ) //$last_ent[0]  MY_USER_DATE
             /*##*/    {
             /*##*/     if ( $play == true ) mysql_query("UPDATE ".MY_TABLE_STATGAME." SET ".MY_STATGAME_DATA."='".$timestamp  ."' WHERE ".MY_STATGAME_ID."='".$row[MY_STATGAME_ID]."'");
             /*##*/     echo $c++.' $timestamp='.$timestamp."Дата= $regs[1].$regs[2].$regs[3]"."strftime=".strftime('%e.%m.%Y %T', $timestamp )." IP=".$last_ent[2] ."<br/>";
             /*##*/    }
             /*##*/      unset ( $regs ) ;       
             /*##*/   }       
             ######## // конвертер ##################################################################
 
 }
function _my_count_rows ( $name ) // навигация 
 {
     return mysql_num_rows ( mysql_query ( "SELECT * FROM ".$name ) ) ;
 }

function _my_navigation_bar ( $bar=false , $condition=false, $limit=false ) // навигация 
 { 
   //if ( $bar == false and $condition == false and $limit == false) 
   if ( $bar == false ) 
    {
     if ( $limit != false ) $limit =  " LIMIT ".$limit  ;//1 = начальная позиция , 2 = колво элементов
     $trig =   MY_NAVIGATION_ORDER .$condition." ORDER BY ".MY_NAVIGATION_ID.", ".MY_NAVIGATION_ORDER." ASC ".$limit ;
    
    }
   else 
    {
       $trig =  MY_NAVIGATION_ORDER .$condition." AND ".MY_NAVIGATION_TYPE ."='".$bar ."' ORDER BY ".MY_NAVIGATION_ORDER." ASC" ;
     
    }
   static $resset = "1" ;
   static $result = false ;
   if ( $bar != $resset ) 
    {
     $result = mysql_query ( "SELECT * FROM ".MY_TABLE_NAVIGATION ." WHERE ". $trig ) ;
     $resset = $bar ;
    }
   return mysql_fetch_assoc ( $result ) ; 
   //$sort ORDER BY id ASC 
   // прямо = ASC,
   // в зат = DESC"// сортировка контента
   //$condition = ">0"  ;//условия выборки
   //$limit = 8 ;// лимит выборки
   //$table =  'top_user';       
   //$bar =  'top_user'; // панель      
 }
function _my_subscription_db ( $play=false ) // рассылка новостей, формируем базу рассылки из списка пользователей
 {          
   $c = 0 ;
   $mylo[$c] = '' ;
   $result = mysql_query ( "SELECT * FROM ".MY_TABLE_PLAYERS ." WHERE " .MY_USER_NUMID ) ;
   while ( $row = mysql_fetch_assoc ( $result ) )
    {
     if ( !in_array( $row[MY_USER_EMAIL], $mylo ) ) if ( $play == true ) mysql_query ( "INSERT INTO ". MY_TABLE_SUBSCRIPTION ." VALUES ( NULL,'".$row[MY_USER_EMAIL]."', '1000000111','".$row[MY_USER_NUMID]."','Рассылка на мыло, выборка из БД' )" ) ;
     $mylo[$c++] = $row[MY_USER_EMAIL] ;
    }       
 }
function mode ( $game, $tm, $type='on' ) // управление настройками
 {
   //$c = 0 ;
   $i = 0 ;
   $a = array("0001","0002","0004","0010","0020","0040","0100","0200","0400","1000","2000","4000","1001","1002","1004","1010","1020","1040","A001","A002","A003","A004");
   if ( $type == "on" ) $off = "off" ;
   else $off = false ;
   foreach ( $a as $k ) $mode[$k] = $off ; 
   for ( $c = 1 ; $c <= 6; $c++ ) 
    { 
     if ( $tm['m'.$c] == 1 or $tm['m'.$c] == 3 or $tm['m'.$c] == 5 or $tm['m'.$c] == 7 ) : $mode[$a[$i++]] = $type ; $mode['A00'.$c] = 0; else : $i++; endif;
     if ( $tm['m'.$c] == 2 or $tm['m'.$c] == 3 or $tm['m'.$c] == 6 or $tm['m'.$c] == 7 ) : $mode[$a[$i++]] = $type ; $mode['A00'.$c] = 3; else : $i++; endif;
     if ( $tm['m'.$c] == 4 or $tm['m'.$c] == 5 or $tm['m'.$c] == 6 or $tm['m'.$c] == 7 ) : $mode[$a[$i++]] = $type ; $mode['A00'.$c] = 6; else : $i++; endif;
    }
/*    
   $mode['0001'] общий банк
   $mode['0002'] 9 линий банк
   $mode['0004'] слотовый банк
   $mode['0010'] забираем в джек пот
   $mode['0020'] 1000000034 переключатель генератора
   $mode['0040']  если ON то лимит в монетах
   $mode['0100']  // если ON то лимит + сумма ставки - 
   //Copyright "NiKA" sz-tashtagol.ru 
*/
 return $mode ;
 }

function pager ( $amount, $pageslot, $slotlistid, $table, $search, $element, $true, $sort = false ) // вытаскиваем инфу, список слотов, и пр.
 { 
   $row = array () ; 
   $amount = 10 ; //сколько показывать номеров максимально
   //$element = DOMAINNAME.LNG."?action=games&gamelistid=" ;
   //$pageslot= 12 ; // кол-во слотов отображаемых на странице
   //$slotlistid = 1 ;// текущяя страница
   //$table = MY_TABLE_SLOTLIST ;// что ищем
   //$search = MY_SLOTLIST_RUN .">0" ;//откуда и устовия поиска(выборки)
   //$sort ORDER BY id  ASC"// сортировка контента
   $strocall = mysql_num_rows ( mysql_query ( "SELECT * FROM ". $table ." WHERE ".$search ) ); //вычисляем скока записей 
   $allpages =  ceil( $strocall / $pageslot ) ;//сколько страниц всего
   if ( $slotlistid > $allpages or $slotlistid < 1 )$slotlistid = 1 ;
   $limit =  ( $slotlistid * $pageslot ) - $pageslot ;
   if ( !isset( $element ) or isset( $true ) )
    { 
     $c = 0 ; 
     if ( $sort == true ) $sort = " ORDER BY ".$sort ." " ;  
     $res = mysql_query ( "SELECT * FROM ".$table ." WHERE ".$search .$sort ." LIMIT ". $limit.", ".$pageslot ) ;// делаем правильную выборку,сортировку, активные слоты
     while ( $row[$c++] = mysql_fetch_assoc ( $res ) ) ;
    }
   if( isset( $element ) )
    {  
     $block =  ceil( $slotlistid  / 10 )-1 ;// сколько у нас блоков 
     $c = ( $block * $amount );
     $el = false ; //"\n" ;
     $left = $c - 1 ;// назначаем "нижнию" страницу
     if ( $allpages > 100 ) echo '<a href="'.$element.'1'.'">&lt;&lt; </a>'.$el ; 
     echo '<a href="'.$element ; 
     if ( $slotlistid > 1 and $left > 0 ) echo $left ;// проверяем не менше ли "нижния" стр.
     else echo "1" ; // если менше то выводим 1 (хотя вывод отрицательного числа не влияет-стоит защита выше, но это не этично)
     echo'">&laquo;</a>'.$el ; 
     $stoplist =  ( $block * $amount ) + $amount ;
     while ( /*$allpages-- > 0 */ true) 
      { 
        ++$c ;
       echo '<a href="'.$element.$c.'"' ;
       if ( $c == $slotlistid ) echo 'class="selected"';
       echo '>'.$c.'</a>'.$el ;
       if ( $c >= $stoplist or $c >= $allpages ) break ;
      }
     echo '<a href="'.$element ; 
     if ( $slotlistid < $c and $stoplist < $allpages ) echo $c+1 ; //( $slotlistid + 1 );
     elseif ( $stoplist < $allpages ) echo $c + 1;
     else echo $c ;
     echo '">&raquo;</a>'.$el ;
     if ( $allpages > 100 ) echo '<a href="'.$element.$allpages.'"> &gt;&gt; </a>'.$el ; 
    }
  return $row ;
 }
function _my_stat_partner ( ) // статистика партнерки, для партнера
 {
   $res[0] = mysql_num_rows ( mysql_query ( "SELECT * FROM ".MY_TABLE_PARTNER ." WHERE ".MY_PARTNER_PARTN ."='".$_SESSION['l']."'" ) ) ;// кол-во привлеченных
   $res[1] = mysql_num_rows ( mysql_query ( "SELECT * FROM ".MY_TABLE_PARTNER ." WHERE usd>0 and ".MY_PARTNER_PARTN ."='".$_SESSION['l']."'" ) ) ;// кол-во пополнивших(активных)
   $res[2] = round ( mysql_result ( mysql_query ( "SELECT SUM(usd) FROM ".MY_TABLE_PARTNER ." WHERE usd>0 and ".MY_PARTNER_PARTN ."='".$_SESSION['l']."'" ),0,0 ),2 );// Партнерская сумма
   $res[3] = round ( mysql_result ( mysql_query ( "SELECT ".MY_USER_CPS." FROM ".MY_TABLE_PLAYERS ." WHERE ".MY_USER_USERS ."='".$_SESSION['l']."'" ),0,MY_USER_CPS ),2 ) ;  // партнерская сумма        
   return $res ;
 }


function _my_user_stat_pay ( $login, $amount, $start )// статистика платежей юзера !!! в дальнейшем можно упразднить за ненадобностю, в админке удалил из "Оплаты" 
 { 
   $res = mysql_query ( "SELECT * FROM ".MY_TABLE_STATPAY." WHERE ".MY_STATPAY_USER."='".$login."' LIMIT ". $amount.", ".$start ) ;// 
   $c = 0 ; 
   while ( $row[$c++] = mysql_fetch_assoc ( $res ) ) ;
   $row[$c]['count'] = mysql_num_rows ( mysql_query ( "SELECT * FROM ". MY_TABLE_STATPAY ." WHERE ".MY_STATPAY_USER."='".$login."' " ) );
   return $row ;
 }


function _my_game_set ( $game ) // выборка параметров слота расширенная 
 {
   return mysql_fetch_assoc(mysql_query( "SELECT *, substring(cast(".MY_BANK_MODE." as char),10,1) as m1, substring(cast(".MY_BANK_MODE." as char),9,1) as m2, substring(cast(".MY_BANK_MODE." as char),8,1) as m3, substring(cast(".MY_BANK_MODE." as char),7,1) as m4, substring(cast(".MY_BANK_MODE." as char),6,1) as m5, substring(cast(".MY_BANK_MODE." as char),5,1) as m6 FROM `".MY_TABLE_BANK."` WHERE ".MY_BANK_NAME." = '".$game."' " ) ) ;
 }
 
 
function _my_subscription ( $set, $param = 0, $data = '' ) // рассылка новостей подписка/отписка, анкета
 {  // param 0 - Выборка, 1- упр.подпиской, 9-Вставляем анкету
  if ( 0 == $param ) return mysql_fetch_assoc ( mysql_query ( "SELECT ".$data ." substring(cast(".MY_SUBSCRIPTION_STATUS." as char),10,1) as m1, substring(cast(".MY_SUBSCRIPTION_STATUS." as char),9,1) as m2, substring(cast(".MY_SUBSCRIPTION_STATUS." as char),8,1) as m3, substring(cast(".MY_SUBSCRIPTION_STATUS." as char),7,1) as m4 FROM `".MY_TABLE_SUBSCRIPTION."` WHERE ".MY_SUBSCRIPTION_EMAIL."='".$set[/*MY_SUBSCRIPTION_ID*/'email']."' " ) ) ;
  if ( 0 >  $param ) return mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_SUBSCRIPTION_INFO ." FROM ".MY_TABLE_SUBSCRIPTION . " WHERE ".MY_SUBSCRIPTION_EMAIL."='".$set[MY_SUBSCRIPTION_ID]."' " ) ) ;
  if ( 0 <  $param )
   {
     if ( $param == 9 ) $trigger = MY_SUBSCRIPTION_INFO."='".$data."' " ;
     else $trigger = MY_SUBSCRIPTION_STATUS."='". ( $param + 1000000000)."'" ;//$status = $param + 1000000000 ;
     mysql_query ( "UPDATE ".MY_TABLE_SUBSCRIPTION." SET ".$trigger ." WHERE ".MY_SUBSCRIPTION_ID."='".$set[MY_USER_NUMID]."' " ) ;
   }
/*
define ( "MY_TABLE_SUBSCRIPTION", "subscription" ) ; // таблица рассылки
define ( "MY_SUBSCRIPTION_ID",        "id"       ) ; // id cообщений
define ( "MY_SUBSCRIPTION_INFO", "questionnaire" ) ; // id cообщений
define ( "MY_SUBSCRIPTION_EMAIL",     "email"    ) ; // мыло 
define ( "MY_SUBSCRIPTION_STATUS",    "status"   ) ; // статус
define ( "MY_SUBSCRIPTION_UID",       "uid"      ) ; // id записи юзера
define ( "MY_SUBSCRIPTION_NOTE",      "note"     ) ; // примечание
*/


 }
function _my_subscriptionget ( $set ) //  анкета
 {
  return mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_SUBSCRIPTION_INFO ." FROM ".MY_TABLE_SUBSCRIPTION . " WHERE ".MY_SUBSCRIPTION_EMAIL."='".$set[MY_SUBSCRIPTION_ID]."' " ) ) ;
 } 

function _my_news ( $amount, $start, $admin = 1 ) // вытаскиваем новости
 { 
   $c = 0 ;
   $res = mysql_query ( "SELECT * FROM ".MY_TABLE_NEWS." WHERE ".MY_NEWS_STATUS.">".$admin ."  ORDER BY ". MY_NEWS_TIME ." DESC LIMIT ". $amount.", ".$start ) ;
   while ( $row[$c++] = mysql_fetch_assoc ( $res ) ) ;
   if ( $start < 1 )$row[$c]['count'] = mysql_num_rows ( mysql_query ( "SELECT ".MY_NEWS_ID." FROM ". MY_TABLE_NEWS ." WHERE ".MY_NEWS_STATUS.">".$admin  ) );
   else  array_pop ( $row ) ;// удаляем посл.пустой элемент
   return  $row ;
 }


function _my_stat_adm ( )// вставляем статистику входа в админку
 { 
   mysql_query ( "INSERT INTO ". MY_TABLE_STATADM ." VALUES ( NULL,'".$_SERVER['REMOTE_ADDR']."', '".time ( ) ."' )" ) ;
 }


function _my_slotlist_setting ( $id ) // вытаскиваем настройки слот-листа
 {
  return mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_SLOTLISTSET." WHERE ".MY_SLOTLISTSET_ID."='".$id."'" ) );
 }

function _my_slotlist ( $amount, $start ) // вытаскиваем список слотов
 { 
   $c = 0 ;
   $res = mysql_query ( "SELECT * FROM ".MY_TABLE_SLOTLIST." WHERE ".MY_SLOTLIST_RUN.">0 LIMIT ". $amount.", ".$start ) ;// делаем правельную выборку, только активные слоты
   while ( $row[$c++] = mysql_fetch_assoc ( $res ) ) ;
  return $row ;
 }
 
 
 
function _my_alert_mess ( $alert, $param = false )// выборка сообщений 
 {
   $row = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_ALERT." WHERE ".MY_ALERT_ID."='".$alert."' " ) );
   if ( $param == true ) return $row ;
   else return $row[MY_ALERT_MESS] ;
   
 }
 
function _my_check_coincidence ( $login, $email )// проверка уникальности логина 
 { 
   $set = mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_USER_USERS.", ".MY_USER_EMAIL ." FROM ".MY_TABLE_PLAYERS." WHERE ".MY_USER_USERS."='".$login."' OR ".MY_USER_EMAIL."='".$email."'" ) );
   if ( $set == false ) 
    {
      $text = strtolower ( _my_alert_mess ( 'inadmissible_nam' ) ) ;//выбираем запрещенные имена
      $array = explode ( ',', $text ) ;
      if ( in_array ( strtolower ( $login ), $array ) ) $set[MY_USER_USERS] = $login ;   
    }
   return $set ;
 }


function _my_selected ( $login )// вытаскиваем инфу юзера
 {
  return mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_PLAYERS." WHERE ".MY_USER_USERS."='".$login."'" ) );
  //return $set ;
 }

function _my_settings ( )//выборка настроек проекта
 {
  return mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_SETTINGS ) );
  //return $set ;
 }		


function _my_num_pay ( )// выборка максималного ID из всех платежей
 {
    return mysql_result (mysql_query ( "SELECT  max(".MY_STATPAY_ID.") FROM ".MY_TABLE_STATPAY ) , 0, 0 ) ;
 }
 
function _my_set_ip_user ( $login ) // запоминаем IP и время входа
 {
    mysql_query( "UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_MODE4."='".time ( )."|".$_SERVER['REMOTE_ADDR']."' WHERE ".MY_USER_USERS."='".$login."'" ) ; 
 }


/* добавление инфы юзера */
function _my_private_add ( $login, $data, $xz )
 {
   mysql_query ( "UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_PRIVATE."='".$data."' WHERE ".MY_USER_USERS."='".$login."'" ) ;
 }


/* рега */
function _my_insert_reg ( $login, $pass, $e_mail, $insert_ref )
 {
   mysql_query( "INSERT INTO ".MY_TABLE_PLAYERS."( ".MY_USER_NUMID .", ".MY_USER_USERS .", ".MY_USER_PASS .", ".MY_USER_EMAIL .", ".MY_USER_DATE.",".MY_USER_REGIP .",". MY_USER_CPS_REF ." ) VALUES(NULL,'".$login."','".$pass."','".$e_mail."','".time ( ) ."','".$_SERVER['REMOTE_ADDR']."','".$insert_ref."' )" );// вставляем нового юзера
   $set = mysql_fetch_assoc ( mysql_query ( "SELECT ". MY_USER_NUMID ." FROM ". MY_TABLE_PLAYERS ." WHERE ".MY_USER_USERS ."='".$login ."'" ) ) ;
   mysql_query( "INSERT INTO ".MY_TABLE_SUBSCRIPTION."( ".MY_SUBSCRIPTION_ID .", ".MY_SUBSCRIPTION_EMAIL .", ".MY_SUBSCRIPTION_STATUS .", ".MY_SUBSCRIPTION_UID .", ".MY_SUBSCRIPTION_NOTE." ) VALUES(NULL,'".$e_mail."','1000000111','".$set[MY_USER_NUMID]."','".time ( ) ."' )" );// вставляем уникальный е-маил в список рассылки
   if ( $insert_ref ) mysql_query ( "INSERT INTO ".MY_TABLE_PARTNER." VALUES ( '".$insert_ref."','".$login."','".time ( )."','0.00')" );// инсерт реферала
   //реферала перенес сюда
 }
 
function _my_insert_ref ($reffa, $login ) // инсерт реферала
 { # устарело
   mysql_query ( "INSERT INTO ".MY_TABLE_PARTNER." VALUES ( '".$reffa."','".$login."','".date ( "d.m.y" )."','0.00')" );
 } 
// end reg
function _my_interface_options ( $set )//senduser
 {
  return mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_IOPTIONS." WHERE ".MY_IOPTIONS_MESS."='".$set."'" ) );
 }		

/* пополнение баланса */
function _my_pay ( $chips, $login, $operation, $summ, $type = false )
 {
   $trigout  = 0 ;
   $trigin = preg_replace ( "/[^0-9.]/", "",$chips) ; 
   if( 0 > $chips ) 
    {
     $type    = "out" ;
     $trigout  = preg_replace ( "/[^0-9.]/", "",$chips) ;     
     $trigin = 0 ;
    }
   else if ( $type == false )$type = "in" ;
   
   if ( $operation != S_ADM_OPERATION ) 
    { 
     $flag = "1"  ;
     $con = _my_settings ( ) ;
     $pcash  = $chips / 100 * $con[MY_SETTINGS_CPS] ; //вычисляем партнерские
     if ( $con[MY_SETTINGS_CPS_ADD] == true ) $pbonus = $chips / 100 * $con[MY_SETTINGS_CPS_ADD] ; //вычисляем партнерские дополнительные-бонус
     else $pbonus = $chips / 100 * 30 ; //вычисляем партнерские дополнительные-бонус
     $set =  mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_PARTNER." WHERE ".MY_PARTNER_USER."='".$login."'" ) ) ;// находим логин рефовода 
     mysql_query ( "UPDATE ".MY_TABLE_PARTNER." SET ".MY_PARTNER_CASH."=".MY_PARTNER_CASH."+'".$pcash."' WHERE ".MY_PARTNER_USER."='".$login."'" ) ;// зачисляем рефоводу в партнерке 
     if ( 0 < $pcash ) mysql_query ( "UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_CPS."=".MY_USER_CPS."+'".$pcash."' WHERE ".MY_USER_USERS."='".$set[MY_PARTNER_PARTN]."'"); // зачисляем рефоводу на общий партнерский счет
    }
   else 
    {
     $pbonus = 0 ;
     $flag   = 0 ;
     $pcash  = 0 ; 
    }
   $usr = mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_USER_CASH ." FROM ".MY_TABLE_PLAYERS." WHERE ".MY_USER_USERS."='".$login."'" ) ) ;// вытаскиваем сумму на текущий момент
   mysql_query ( "UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_CASH."=".MY_USER_CASH."+'".$chips."', ".MY_USER_CASHIN."=".MY_USER_CASHIN."+'".$chips."', ".MY_USER_CPS_PROC."=".MY_USER_CPS_PROC."+'".$pcash."', ".MY_USER_CPS_ADD."=".MY_USER_CPS_ADD."+'".$pbonus."' WHERE ".MY_USER_USERS."='".$login."'" ) ;  // зачисляем юзеру на баланс и прибавляем общую сумму депозитов
   mysql_query ( "INSERT INTO ".MY_TABLE_STATPAY ." VALUES(NULL,'".$login."','".time ( ) ."','".preg_replace ( "/[^0-9.]/", "",$summ)."','".preg_replace ( "/[^0-9.]/", "",$chips)."','".$type."','".$operation."', '".$flag."')" ) ; // добовляем еще один платеж  в таблицу статистики
   mysql_query ( "INSERT INTO ".MY_TABLE_STATGAME." VALUES(NULL,'".time ( )."','','".$login."','".$usr[MY_USER_CASH]."','".$trigout."','".$trigin."', '".$type."-".$operation."')" ) ; // Вставляем статистику в игры для неразрывности сумм
 } 
#================================================
/* вывод средств*/

function _my_select_paysys ( $status, $ps = false )//выборка платежных систем (в кабиненте)
 {
  static $res = false ;
  if ( $ps  == true )$trig = " AND ".MY_PS_PS ."='".$ps."' " ;
  else $trig = false ;
  if ( $res != true ) $res = mysql_query ( "SELECT * FROM ". MY_TABLE_PS ." WHERE ".MY_PS_STATUS .">='".$status."' ".$trig  ) ;
  return  mysql_fetch_assoc ( $res );
 }

function _my_select_order ( $login, $status )//выборка  заказы платежей для юзера (в кабиненте)
 {
  static $res = false ;
  if ( $res != true ) $res = mysql_query ( "SELECT * FROM ". MY_TABLE_ORDER ." WHERE ". MY_ORDER_USER ."='".$login."' AND ".MY_ORDER_FLAG.">'".$status."' " ) ;
  return  mysql_fetch_assoc ( $res );
 }

function _my_withdraw ( $sumout, $login )//withdraw 
 {
   mysql_query("UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_CASH."=".MY_USER_CASH."-'".$sumout."', ".MY_USER_CASHOUT."=".MY_USER_CASHOUT."+'".$sumout."' WHERE ".MY_USER_USERS."='".$login."'");
 }


function _my_order ( $login, $cash, $wherepay, $outsumm, $status  )// заказы платежей 
 {
   // mysql_query("INSERT INTO ".MY_TABLE_ORDER." VALUES(NULL,'".$login."','".$cash."','".$wherepay."','".$outsumm."','".$status."')");
   //if ( $status == "1")
   // {
      //$datein  = date ( "d.m.y" ) ; 
      //$datein .= date ( "H:i:s" ) ; 
      $dateout = "Не обработано" ; 
   // }
   //else
     
   //mysql_query("INSERT INTO ".MY_TABLE_ORDER." VALUES(NULL,'".$login."','".$cash."','".$wherepay."','".$outsumm."','".date ( "d.m.y" )." / ".date ( "H:i:s" )."','".$status."','".$dateout."')");
   mysql_query("INSERT INTO ".MY_TABLE_ORDER." VALUES(NULL,'".$login."','".$cash."','".$wherepay."','".$outsumm."','".$outsumm."','".time ( )."','".$status."','".$dateout."')");
 }
 
/* вывод средств*/
function _my_withdraw_all ( $login, $cash, $outsumm, $paysum, $wherepay, $appointment  )//withdraw // MY_ORDER_APPO
 {     //                   логин|    | снимаемая|  сумма  | платежные|   Платежная|
       //                     сумма до|     сумма| перевода| реквизиты|     система|
   $status = "1" ;//$appointment = предназначен для ориентации скрипта, при оплате должена загружатся та П\С на которую был сделан заказ
   $dateout = "Не обработано" ; 
   $usr =  mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_USER_CASH ." FROM ".MY_TABLE_PLAYERS." WHERE ".MY_USER_USERS."='".$login."'" ) ) ;// вытаскиваем сумму на текущий момент
   mysql_query ( "UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_CASH."=".MY_USER_CASH."-'".$outsumm."', ".MY_USER_CASHOUT."=".MY_USER_CASHOUT."+'".$outsumm."' WHERE ".MY_USER_USERS."='".$login."'");
   mysql_query ( "INSERT INTO ".MY_TABLE_ORDER." VALUES ( NULL,'".$login."','".$cash."','".$wherepay."','".$outsumm."','".$paysum."','".$appointment."','".time ( )."','".$status."','".$dateout."' ) " ) ;
   mysql_query ( "INSERT INTO ".MY_TABLE_STATGAME." VALUES(NULL,'".time ( )."','','".$login."','".$usr[MY_USER_CASH]."','".$outsumm."','0', 'out-".$appointment."')" ) ; // Вставляем статистику в игры для неразрывности сумм
   //_my_stat_pay_m ( $login, $paysum, $outsumm, 'out', $wherepay, $status ) ;
   mysql_query ( "INSERT INTO ".MY_TABLE_STATPAY." VALUES(NULL,'".$login."','".time ( ) ."','".$paysum."','".$outsumm."','out','".$wherepay."', '".$status."')" ) ;// инсерт статистика платежей
   //_my_stat_pay_m ( $login, $summ, $chip, $type, $systempay, $flag )// инсерт статистика платежей

 }
 
 
 
 
 
 
 
 
/* востановление пароля */
function _my_forgotten ( $login, $oldpass, $newpass, $key, $flag  )// востановлние пароля 
 {
   mysql_query("INSERT INTO ".MY_TABLE_FORGOT." VALUES(NULL,'".$login."','".$oldpass."','".time()."','".$newpass."','".$key."', '".$flag ."')");
 }

function _my_select_forgotten ( $login, $key, $flag )// вытаскиваем инфу юзера из базы востановления пароля
 {
   if ( $login <> "" and $key  == "" and $flag <> "" ) $set = mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_USER."='".$login."' AND  ".MY_FORGOT_FLAG."='".$flag."'" ) );
   if ( $login == "" and $key  <> "" and $flag == "" ) $set = mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_KEY. "='".$key."'" ) );
   if ( $login <> "" and $key  <> "" and $flag == "" ) $set = mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_USER."='".$login."' AND ".MY_FORGOT_COD. "='".$key."'"   ) );
   return $set ;
 }
// дубль функции 
function _my_select_forgotten_d ( $id, $login, $key, $flag )// вытаскиваем инфу из базы востановления пароля
 {
   if ( $login <> "" and $key  == "" and $flag <> "" ) return mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_USER."='".$login."' AND  ".MY_FORGOT_FLAG."='".$flag."' AND ".MY_FORGOT_ID."='".$id."'" ) );// если записей несколько на одного юзера и с флагом "1" то выбираем самую последнию
   if ( $login == "" and $key  <> "" and $flag == "" ) return mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_KEY. "='".$key."'" ) );
   if ( $login <> "" and $key  <> "" and $flag == "" ) return mysql_fetch_array ( mysql_query ( "SELECT * FROM ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_USER."='".$login."' AND ".MY_FORGOT_COD. "='".$key."'"   ) );
   //return $set ;
 }


function _my_del_flag_forgotten ( $flag, $key )// удаляем флаг если ссылко просрочен 
 {
   mysql_query("UPDATE ".MY_TABLE_FORGOT." SET ".MY_FORGOT_FLAG."='".$flag."' WHERE ".MY_FORGOT_KEY."='".$key."'");
 }

function _my_newpass_forgotten ( $newpass, $login )// удаляем флаг если ссылко просрочен 
 {
   mysql_query("UPDATE ".MY_TABLE_PLAYERS." SET ".MY_USER_PASS."='".$newpass."' WHERE ".MY_USER_USERS."='".$login."'");
 }
function _my_id_forgotten ( $login )
 {  
   $set = mysql_result (mysql_query ( "SELECT  max(".MY_FORGOT_ID.") FROM  ".MY_TABLE_FORGOT." WHERE ".MY_FORGOT_USER."='".$login."'" ) , 0, 0 ) ;
   return $set ;
 }
 
# end востановление пароля 

function _my_messages ( $theme, $login=false, $email, $message, $status, $reply=false )// обратная связь, сообщения
 {  
   if ( $login == false and isset ( $_SESSION['l'] ) ) $login =  $_SESSION['l'] ;
   elseif ( $login == false and isset ( $_SESSION['v']['name'] ) ) $login =  $_SESSION['v']['name'] ;
   elseif ( $login == false )$login = "Guest" ;
   //echo "<pre>\n".$message ;
   $bring = mysql_escape_string ( stripslashes ( trim ( $message ) ) ) ;
   mysql_query ( "INSERT INTO ". MY_TABLE_MESSAGES ." VALUES ( NULL,'".time() ."', '".$theme."','".$login."','".$email."','".$bring."','".$status."','".$reply."' )" ) ;
/*

// messages      
define ( "MY_TABLE_MESSAGES",  "messages" ) ; // таблица сообщений
define ( "MY_MESSAGES_ID",     "id"       ) ; // id 
define ( "MY_MESSAGES_DATE", "timestamp"  ) ; // дата время 
define ( "MY_MESSAGES_THEME",  "theme"    ) ; // Тема сообщения  
define ( "MY_MESSAGES_USER",   "user"     ) ; // логин 
define ( "MY_MESSAGES_MAIL",   "email"    ) ; // емаил для ответа
define ( "MY_MESSAGES_MESS",   "message"  ) ; // тело сообщения
define ( "MY_MESSAGES_STATUS", "status"   ) ; // статус 
960 906 46 22  32446 шестакофф

*/ 
 
 
 }
////////////////////////////////////////////////////

function _user_mem ( $login, $e_mail ) //запоминаем инфу (для реги)
 {
  // global $login , $e_mail ;
   $_SESSION['login'] = $login   ;
   $_SESSION['e_mail'] = $e_mail ;
 }

function _user_unset ( $act ) //удаляем инфу из сесий
 { 
   if ( $act == "rega" or $act == "reg" )// удаляем инфу из сесий  (после удачной реги)
    {
      unset ( $_SESSION['login']  ) ;
      unset ( $_SESSION['e_mail'] ) ;
      unset ( $_SESSION['capcha'] ) ;
    }
   if ( $act == "reg" ) unset ( $_SESSION['rega'])  ; // удаляем инфу из сесий  и при входе на форму
 }
/* генератор паролей*/
function passgen ( )
 { 
   $length = P_PASS_LENGTH ;                  // задаем длинну пароля
   $gen_massiv™ = range('"','z' ) ;           // генерим масссив из символов от символа " до символа z 
   srand( ( double ) microtime( ) * 1000000 ); 
   shuffle ( $gen_massiv™ );                  // перемешиваем массив
   $gen_massiv™ = implode ($gen_massiv™);     // склеиваем масив в строку 
   $gen_massiv™ = preg_replace ( "/[".P_PASS_SIMBOL."]/",    '', $gen_massiv™  ) ; // оставляем символы которые будем использовать в качестве пароля 
   $gen_massiv™ = substr($gen_massiv™,0,$length) ; // обрезаем строку до задaнaго кол-ва символов
   return $gen_massiv™ ;
 }
function exchange_rate () // курсы валют 
 {
   $settings = _my_settings ( ) ;
   //$exchange_rate = explode ( "|", $settings[MY_SETTINGS_EXCHRATE] ) ;
   //$exchange_rate™ =  implode ("&",$exchange_rate);// склеиваем масив снова в строку с разделителем "&" //parse_str ($result);
   //$exchange_rate™ =  $settings[MY_SETTINGS_EXCHRATE] ;// склеиваем масив снова в строку с разделителем "&" //parse_str ($result);
   //return $exchange_rate™ ;//wmr=0.00&wmz=1.00&wme=1.32&wmu=0.13&wmb=0.00&wmy=0.00&wmg=0.00&
   return $settings[MY_SETTINGS_EXCHRATE] ;//wmr=0.00&wmz=1.00&wme=1.32&wmu=0.13&wmb=0.00&wmy=0.00&wmg=0.00&
 }
function mode_switch ( $loc ) // mode переключатель режима
 {
  if ( isset ( $_SESSION['l'] ) ) 
   {
    $l = $_SESSION['l'] ;
    if ( isset ( $_POST['mode'] ) ) 
     {
      $mode = preg_replace ("/[^0-9A-Za-z-_]/", "", $_POST['mode'] ) ;  
      if ( $mode == "REAL" ) 
       {
         $_SESSION['gamemode'] = "real" ;
         $fun = $_SESSION['f'] ;
         session_destroy ( )   ;
         session_start ( )     ;
         $_SESSION['l'] = $l   ;
         $_SESSION['f'] = $fun ;
       }
      else $_SESSION['gamemode'] = "fun" ;
     }
    else $_SESSION['gamemode'] = "fun" ;
    if ( $_SESSION['gamemode'] == "fun" ) //Переключатеть режима игры на "Фантики"
     {
       $fun = $_SESSION['f'] ;
       session_destroy ( )   ;
       session_start ( )     ;
       $_SESSION['l'] = $l   ;
       $_SESSION['gamemode'] = "fun" ;
       $_SESSION['f'] = $fun ;
     } 
   }
  elseif ( isset ( $_SESSION['v'] ) ) $l = $_SESSION['v']['name'] ;//"Visitor" ;
  else die( header( "Location: /?action=login" ) ) ;
  ############ end 
 }  
 
function urlref ( $url ) // Выборка урла для реги
 {
   $row = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_WEBMASTER." WHERE ".MY_WEBMASTER_URL."='".$url."' " ) ) ;// делаем правельную выборку, только активные слоты
   return $row ; 
  } 
function urllist ( $login ) // список саитофф
 {
   $res = mysql_query ( "SELECT * FROM ".MY_TABLE_WEBMASTER." WHERE ".MY_WEBMASTER_USER."='".$login."' " ) ;// делаем правельную выборку, только активные слоты
   $c = 0 ; 
   while ( $row[$c++] = mysql_fetch_assoc ( $res ) ) ;
   return $row ; // \\192.168.12.196
  } 
  
function urlchecker ( $str ) // парсер саита
 {
   $error = 0 ;
   $host = '' ;
   $url = preg_replace ( "/[^0-9A-Za-z.\-_]/", '',str_replace ( 'http:', '', preg_replace ( "/[^0-9A-Za-z.\-_:]/", '', $str ) ) ) ; // вырезаем лишнии символы, удаяем http:, далее вырезаем : - на всяк.случай
   if ( isset ( $_SESSION['checkurl'] ) ) 
    {
     if ( $_SESSION['checkurl'] == true ) $url = $_SESSION['checkurl'] ;
    }
   if ( $url == false ) $error = "2" ; // поле не может быть пустым
   
   $parse_url = parse_url( "http://".$url."/" ) ;                                              // разбиваем адрес на массив, который будет содержать хост, путь и список переменных.
   if ( isset ( $parse_url["path"]  ) ) $path  = $parse_url["path"]        ;else $path = '' ; // путь до файла(/patch/file.php)
   if ( isset ( $parse_url["query"] ) ) $path .= "?" . $parse_url["query"] ;                  // добавляем к пути список переменных
   if ( isset ( $parse_url["host"]  ) ) $host  = $parse_url["host"]        ;else $host = '' ; // тут получаем хост
   if ( mysql_fetch_assoc ( mysql_query ( "SELECT ".MY_WEBMASTER_URL." FROM ".MY_TABLE_WEBMASTER." WHERE ".MY_WEBMASTER_URL."='".$host."' " ) ) ) 
    {
     $error = 3 ; // проверяем нет ли такого url 
     unset ( $_SESSION['checkurl'] ) ;
     unset ( $host ) ;
     
    }   
   
   //echo "<font color=red>&  hostf=".$host ."& urlfs=".$url." !!!</font>" ;   
   if ( isset ( $_SESSION['checkurl'] ) and $error == 0 ) 
    {
     $fp = fsockopen ( $host, 80, $errno, $errstr, 50 ) ;
      if ( !$fp ) 
       {
        $error = 1 ;
        unset ( $_SESSION['checkurl'] ) ;
       }
        
    }
   else $fp = false ;
   if ( $fp == true )
    {
      fputs ( $fp, "GET ".$path ." HTTP/1.0 \n"  // формируем заголовок, прикидываемся простым юзером
                   ."Accept: image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, application/vnd.ms-excel, application/vnd.ms-powerpoint, application/msword, application/x-ms-application, application/x-ms-xbap, application/vnd.ms-xpsdocument, application/xaml+xml, application/x-shockwave-flash, */* \n"
                   ."Accept-Language: ru \n"
                   ."User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Unix ubuntu4.2; SV1; Gamatic.ru powered; .NET CLR 2.0.50727; .NET CLR 3.0.4506.2152; .NET CLR 3.5.30729) \n"
                   ."Host: ".$host." \n"
                   ."Connection: Keep-Alive \n\n" ) ;// отправляем данные
      //fputs( $fp, $out); // отправляем данные
      $c = 0 ;
      $i = 0 ;
      $check = false ;
      while( !feof ( $fp ) ) // построчно считываем ответ
       { 
         $gets  = fgets ( $fp   ) ;
         //$fgets = trim  ( $gets ) ;
         $head  = explode ( "head", strtolower ( $gets ) ) ;
         if ( isset ( $head[1] ) )$i++ ; 
         $result = explode ( "meta", strtolower ( $gets ) )  ;
         if ( isset ( $result[1] ) ) 
          { 
             $error = 5 ;
              parse_str (  str_replace ( ' ', '&', preg_replace ( "/[^0-9A-Za-z.\-_= ]/", '', $result[1]  ) ) ) ;// заменяем пробел на эмперсанд
              if ( isset ( $name )    ) 
               {
                 if ( $name  == preg_replace( "/[^0-9a-zA-Z]/", '',$_SERVER['SERVER_NAME'])."urlchecker" ) $check = true ;
                 //echo "\n Проверка № 1 пройдена успешно !<br />\n".$name."\n<br />\n" ;
               unset ( $name ) ;
               }
              if ( isset ( $content ) and $check == true ) 
               {
                 $res = mysql_fetch_assoc ( mysql_query ( "SELECT * FROM ".MY_TABLE_WEBMASTER." WHERE ".MY_WEBMASTER_URL."='".$url."' " /* LIMIT ". $amount.", ".$start */ ) ) ;// делаем правельную выборку, только активные слоты
                 //if ( $res == false ) return "error=5" ;
                 if ( $content == md5 ( md5 ( $_SESSION['l'] ).":".md5 ( $host ) ) ) 
                  {
                    // mysql_query ( "UPDATE ".MY_TABLE_WEBMASTER." SET ".MY_WEBMASTER_STATUS."='0' WHERE ".MY_WEBMASTER_URL."='".$res[MY_WEBMASTER_URL]."'" ) ;
                     mysql_query ( "INSERT INTO ".MY_TABLE_WEBMASTER." VALUES( NULL,'".$_SESSION['l']."','".$_SESSION['checkurl']."','1' ) " ) ;
                    //echo "<font color=red> <h1>ПРОЙДЕНО !!!!!</font>" ;
                    $error = 4 ;
                    break ;//echo "\n Проверка № 2 пройдена успешно !<br />\n".$content."\n<br />\n" ;
                  }
                unset ( $content ) ;
               }
           //echo "<font color=red> meta найдён но проверко не пройден !!!</font>" ;
          }
         $c++ ;
         if ( $i > 1 ) break ;
        }
        fclose($fp);
       //echo "<font color=red> саит найдён но проверко не пройден !!!</font>" ;
    }
   //elseif ( isset ( $_SESSION['checkurl'] ) ) $error = 1 ;//$_SESSION['checkurl'] = $host ; //echo "<font color=red> саит не найдён !!!</font>" ;
   //elseif ( !isset ( $_SESSION['checkurl'] )  ) /*$error = 1 ;//*/ $_SESSION['checkurl'] = $host ; //echo "<font color=red> саит не найдён !!!</font>" ;
   elseif ( !isset ( $_SESSION['checkurl'] ) and $error == 0 ) /*$error = 1 ;//*/ $_SESSION['checkurl'] = $host ; //echo "<font color=red> саит не найдён !!!</font>" ;
   $a = array ( 'error' => $error, 'host' => $host ) ;
   return $a ;
/*
MY_TABLE_WEBMASTER",  "webmaster" )
MY_WEBMASTER_ID",     "id"        )
MY_WEBMASTER_USER",   "cps"       )
MY_WEBMASTER_URL",    "url"       )   
MY_WEBMASTER_STATUS", "status"    )   
MY_WEBMASTER_CHECK",  "checker"   )   
   */
 }  


function other_set () // курсы валют 
 {
   $settings = _my_settings ( ) ;
   $other_set = explode ( "|", $settings[MY_SETTINGS_OTHER] ) ;   
   return $other_set ;//wmr=0.00&wmz=1.00&wme=1.32&wmu=0.13&wmb=0.00&wmy=0.00&wmg=0.00&
 }
function messend ( $mess ) 
 {
  exit ( $mess );
 }  

function mround( $number, $precision = 0 ) //огруглятор в меншую сторону дробных чисел 0.9999999999999
 {  
    $precision = ( $precision == 0 ? 1 : $precision ) ;     
    $pow = pow ( 10, $precision ) ;  
    return sprintf( "%01.2f", ( floor ( $number * $pow ) / $pow ) ) ;  
 }

function _debug_ ( $in=false, $file = "debug.txt",$msg = false ) // запись в файл
 {
  $data = "_POST:&" ;
  for ( Reset ( $_POST ) ; ( $k = key ( $_POST ) ) ; Next ( $_POST ) ) $data .= $k . "=". $_POST[$k] . "&" ;// скан POST'а
  $data .= "_GET:&" ;
  for ( Reset ( $_GET ) ; ( $k = key ( $_GET ) ) ; Next ( $_GET ) ) $data .= $k . "=". $_GET[$k] . "&" ;// скан POST'а

  $dop .= "\n".date("d.m.Y").' | '.date( "H:i:s" )."\n";
  $dop .= 'Status='.$msg."\n" ;
  $dop .= $in ;
  $out  = str_replace ( "&",    "\n", $data  ) ;
  $out .= $dop."\n&".$data ;
  $out .= "\n".'=========================='."\n" ;
  $fp = fopen( $file, "a" ) or die ( "Не удалось открыть файл" );// открываем файло на запись с добовление строк в конец
  fputs( $fp, $out ); // записываем файл 
  fclose( $fp ); // закрываем файл

 
 }
function anti_spy() {exit ( base64_decode ( 'IDwvYm9keT4KPC9odG1sPg==') ) ;}

?>