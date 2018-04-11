<?php
$a = $_SESSION['session_admin'];
echo "<!-- Меню -->\r\n <TABLE cellSpacing=0 cellPadding=0 width=\"100%\" border=0>\r\n   <TBODY>\r\n   <TR><!--begin member area and navigation  (left column)-->\r\n     <TD vAlign=top width=180>\r\n       <TABLE class=printHidden cellSpacing=0 cellPadding=0 border=0>\r\n         <TBODY>\r\n         <TR>\r\n           <TD width=180>\r\n             <TABLE cellSpacing=0 cellPadding=0 border=0>\r\n               <TBODY>\r\n               <T";
echo "R>\r\n                 <TD colSpan=2><IMG height=16 src=\"templates/images/member_top.gif\" width=180></TD>\r\n               </TR>\r\n\t\t\t   <TR>\r\n                 <TD bgColor=#f8f8f8><IMG height=39 src=\"templates/images/spacer.gif\" width=23></TD>\r\n                 <TD class=copymidbrn width=157 bgColor=#f8f8f8>\r\n                   ";
echo "<BR>\r\n                   ";
echo "<s";
echo "trong>Вы зашли как: ";
echo $a;
echo "</strong>\r\n                 </TD>\r\n               </TR>\r\n               <TR>\r\n                 <TD colSpan=2><IMG height=17 src=\"templates/images/member_bottom.gif\" width=180></TD>\r\n               </TR></TBODY>\r\n             </TABLE>\r\n           </TD>\r\n         </TR>\r\n         <TR>\r\n           <TD><!--Меню навигации-->\r\n             <TABLE class=navigationTable cellSpacing=0 cellPadding=0 border=0>\r\n             ";
echo "  <TBODY>\r\n               <TR>\r\n                 <TD>\r\n                   <TABLE cellSpacing=2 cellPadding=0 border=0 width=\"170\">\r\n                     <TBODY>\r\n                     <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg>\r\n                         \t<A class=mI style=\"";
if ( $menu_sub == "index.php" )
{
    echo "BACKGROUND-COLOR: #F5F5F5;width:158px;";
}
else
{
    echo "";
}
echo "\" href=\"index.php\"><IMG height=8 src=\"templates/images/spacer.gif\" width=8 border=0>Центр Поддержки</A>\r\n                         </DIV>\r\n                       </TD>\r\n                     </TR>\r\n                     <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg>\r\n                         \t<A class=mI onclick=\"javascript:showHideTable('innerTable2')\" href=\"javascript:;\">\r\n  ";
echo "                       \t<IMG height=8 src=\"templates/images/nav_arrow_timp.gif\" width=8 border=0>&nbsp;Настройки Казино</A>\r\n                         \t<TABLE id=innerTable2 style=\"DISPLAY: ";
if ( $menu == "config" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n   \t\t                        <TBODY>\r\n                           \t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo "  href=\"admin_config.php\">Главные Настройки</A></TD></TR>\r\n   \t\t\t\t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config_bank.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_config_bank.php\">Настройки Банков</A></TD></TR>\r\n   \t\t\t\t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config_jp.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_config_jp.php\">Настройки Джекпотов</A></TD></TR>\r\n                           \t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config_pay.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_config_pay.php\">Платежные Настройки</A></TD></TR>\r\n                           \t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config_profile.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_config_profile.php\">Изменить пароль</A></TD></TR>\r\n                           \t\t</TBODY>\r\n                           \t</TABLE>\r\n           \t\t\t\t</DIV>\r\n           \t\t\t  </TD>\r\n           \t\t\t </TR>\r\n           \t\t\t";
?>

<TR>
<TD>
<DIV class=menuBg>
<A class=mI onclick="javascript:showHideTable('innerTable8')" href="javascript:;">

<IMG height=8 src="templates/images/nav_arrow_timp.gif" width=8 border=0>&nbsp;Парт. программа</A>
<TABLE id=innerTable8 style="DISPLAY: <?php if($menu == 'partnership') echo 'block'; else echo 'none'?>" cellSpacing=0 cellPadding=0 width="100%">
<TBODY>
<TR><TD noWrap><A class="<?php if($menu_sub == 'admin_partnership_options.php') echo 'mI_on'; else echo 'mI2'?>"  href="admin_partnership_options.php">Настройки</A></TD></TR>
<TR><TD noWrap><A class="<?php if($menu_sub == 'admin_partnership_users.php') echo 'mI_on'; else echo 'mI2'?>" href="admin_partnership_users.php">Список партнёров</A></TD></TR>
<TR><TD noWrap><A class="<?php if($menu_sub == 'admin_partnership_withdraw.php') echo 'mI_on'; else echo 'mI2'?>" href="admin_partnership_withdraw.php">Вывод средств</A></TD></TR>
</TBODY>
</TABLE>
</DIV>
</TD>
</TR>

<?php 
echo "<TR>\r\n                       <TD>\r\n                         <DIV class=menuBg>\r\n                         \t<A class=mI onclick=\"javascript:showHideTable('innerTable3')\" href=\"javascript:;\">";
echo "\r\n                         \t<IMG height=8 src=\"templates/images/nav_arrow_timp.gif\" width=8 border=0>&nbsp;Пользователи</A>\r\n                         \t<TABLE id=innerTable3 style=\"DISPLAY: ";
if ( $menu == "user" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n   \t\t                        <TBODY>\r\n                           \t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_userlist.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_userlist.php?&mode=list\">Список Пользователей</A></TD></TR>\r\n<!--\t\t\t\t\t\t\t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_partnerlist.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_partnerlist.php\">Партнёры</A></TD></TR>\r\n   \t\t\t\t\t\t\t\t<TR><TD noWrap><A class=";
if ( $menu_sub == "admin_operlist.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_operlist.php\">Операторы</A></TD></TR>\r\n-->\r\n                           \t\t</TBODY>\r\n                           \t</TABLE>\r\n           \t\t\t\t</DIV>\r\n           \t\t\t  </TD>\r\n           \t\t\t </TR>\r\n           \t\t\t <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg>\r\n                         \t<A class=mI onclick=\"javascript:showHideTable('innerTable4')\" href=\"javascript:;\">\r\n     ";
echo "                    \t<IMG height=8 src=\"templates/images/nav_arrow_timp.gif\" width=8 border=0>&nbsp;Финансы</A>\r\n                         \t<TABLE id=innerTable4 style=\"DISPLAY: ";
if ( $menu == "pay" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n\r\n                           \t\t<TR><TD><A class=";
if ( $menu_sub == "admin_pay_deposit.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo "  href=\"admin_pay_deposit.php\">Внесли</A></TD></TR>\r\n   \t\t\t\t\t\t\t\t<TR><TD><A class=";
if ( $menu_sub == "admin_pay_withdrawals.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo "  href=\"admin_pay_withdrawals.php\">Выплаты</A></TD></TR>\r\n\r\n                           \t</TABLE>\r\n           \t\t\t\t</DIV>\r\n           \t\t\t  </TD>\r\n           \t\t\t </TR>\r\n          \t\t\t <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg>\r\n                         \t<A class=mI onclick=\"javascript:showHideTable('innerTable9')\" href=\"javascript:;\">\r\n                         \t<IMG height=8 sr";
echo "c=\"templates/images/nav_arrow_timp.gif\" width=8 border=0>&nbsp;Новости</A>\r\n                         \t<TABLE id=innerTable9 style=\"DISPLAY: ";
if ( $menu == "article" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n\r\n                           \t\t<TR><TD><A class=";
if ( $menu_sub == "admin_news.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_news.php\">Новости</A></TD></TR>\r\n                           \t\t<!-- <TR><TD><A class=";
if ( $menu_sub == "admin_article.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_article.php\">Статьи</A></TD></TR> -->\r\n\r\n                           \t</TABLE>\r\n           \t\t\t\t</DIV>\r\n           \t\t\t  </TD>\r\n           \t\t\t </TR>\r\n                     <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg><A class=mI onclick=\"javascript:showHideTable('innerTable5')\" href=\"javascript:;\">\r\n                         <IMG height=8 src=\"templates/images/nav_arro";
echo "w_timp.gif\" width=8 border=0>&nbsp;Игры</A>\r\n                         <TABLE id=innerTable5 style=\"DISPLAY: ";
if ( $menu == "games" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n                           <TBODY>\r\n                           <TR>\r\n                             <!-- <TD noWrap><A class=mI2 href=\"#\">Просмотр/Ред. Игр</A></TD> -->\r\n   \t\t\t\t\t\t\t <TR><TD noWrap><A class=";
if ( $menu_sub == "admin_config_games.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_config_games.php\">Настройки Игр</A>";
echo "</TD></TR>\r\n                          </TR>\r\n                           </TBODY>\r\n                         </TABLE>\r\n                         </DIV>\r\n                        </TD>\r\n                     </TR>\r\n\r\n                     <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg><A class=mI\r\n                         onclick=\"javascr";
echo "ipt:showHideTable('innerTable6')\"\r\n                         href=\"javascript:;\"><IMG height=8\r\n                         src=\"templates/images/nav_arrow_timp.gif\"\r\n                         width=8 border=0>&nbsp;Дополнительно</A>\r\n                         <TABLE id=innerTable6 style=\"DISPLAY: ";
if ( $menu == "module" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\"\r\n                         cellSpacing=0 cellPadding=0 width=\"100%\">\r\n                           <TBODY>\r\n \t\t\t\t\t\t\t<TR>\r\n                             \t<TD noWrap><A class=";
if ( $menu_sub == "admin_mass_email.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_mass_email.php\">Рассылка E-Mail</A></TD>\r\n\t\t\t\t\t\t\t</TR>\r\n \t\t\t\t\t\t\t<TR>\r\n                             \t<TD noWrap><A class=";
if ( $menu_sub == "admin_mass_pm.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_mass_pm.php\">Рассылка ПМ</A></TD>\r\n\t\t\t\t\t\t\t</TR>\r\n\t\t\t\t\t\t\t</TBODY></TABLE></DIV></TD></TR>\r\n\r\n                     <TR>\r\n                       <TD>\r\n                         <DIV class=menuBg><A class=mI onclick=\"javascript:showHideTable('innerTable7')\" href=\"javascript:;\">\r\n                         <IMG height=8 src=\"templates/images/nav_arrow_timp.gif\" width=8 border=0>&nbsp;Стат. &amp; Аналитика";
echo "</A>\r\n                         <TABLE id=innerTable7 style=\"DISPLAY: ";
if ( $menu == "statistic" )
{
    echo "block";
}
else
{
    echo "none";
}
echo "\" cellSpacing=0 cellPadding=0 width=\"100%\">\r\n                           <TBODY>\r\n<!--\r\n                           <TR>\r\n                             <TD noWrap><A class=mI2 href=\"#\">Траффик стат.</A></TD></TR>\r\n                           <TR>\r\n                             <TD noWrap><A class=mI2 href=\"#\">Финансовая стат.</A></TD></TR>\r\n                           <TR>\r\n                             <TD noWrap><A cla";
echo "ss=mI2 href=\"#\">Игры стат.</A></TD></TR>\r\n-->\r\n                           <TR>\r\n                             <TD noWrap><A class=";
if ( $menu_sub == "admin_statistic_history.php" )
{
    echo "mI_on";
}
else
{
    echo "mI2";
}
echo " href=\"admin_statistic_history.php\">Игровая статистика</A></TD></TR>\r\n                           </TBODY>\r\n                         </TABLE>\r\n                         </DIV>\r\n                       </TD>\r\n                     </TR>\r\n\r\n\r\n \t\t\t\t\t\t   </TBODY>\r\n \t\t\t\t\t\t </TABLE>\r\n \t\t\t\t\t\t</TD>\r\n \t\t\t\t\t</TR>\r\n\r\n                               </TBODY></TABLE>\r\n             <P>&nbsp;</P></TD></TR></TBODY></TABLE></TD>";
?>
