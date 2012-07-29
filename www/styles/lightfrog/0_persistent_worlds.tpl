<!--section-start::main_body-->
<div align="center"><h2>Persistente Welten</h2></div>
<p>
<table width="90%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td valign="top" align="left" colspan="7" width="14%">
      <b><a href="?go=persistentlist&amp;sort=name">Name</a></b>
    </td>
  <tr>
    <td width="14%"><b><a href="?go=persistentlist&amp;sort=setting">Setting</a></b></td>
    <td width="14%"><b><a href="?go=persistentlist&amp;sort=genre">Genre</a></b></td>
    <td width="15%"><b><a href="?go=persistentlist&amp;sort=spiel">Spiel</a></b></td>
    <td width="14%"><b>Addons</b></td>
    <td width="14%"><b><a href="?go=persistentlist&amp;sort=anmeldung">Anmeldung ab</a></b></td>
    <td width="15%"><b><a href="?go=persistentlist&amp;sort=spieler">max. Spieler</a></b></td>
    <td width="14%"><b><a href="?go=persistentlist&amp;sort=level">max. Level</a></b></td>
  </tr>
  <tr><td colspan="7"><br></td></tr>
  {..text..}
</table>
<!--section-end::main_body-->

<!--section-start::list_entry-->
  <tr>
    <td colspan="6" width="*">
      <table width="100%" cellpadding="0" cellspacing="0" border="0">
        <tr>
          <td valign="top" width="16">&rArr;</td>
          <td width="*" align="left">
	        <a href="?go=persistentdetail&amp;pw={..link..}">{..name..}</a>
	      </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td class="small" width="15%" valign="top" align="left">{..setting..}</td>
    <td class="small" width="15%" valign="top" align="left">{..genre..}</td>
    <td class="small" width="5%" valign="top" align="left">{..spiel..}</td>
    <td class="small" width="20%" valign="top" align="left">{..dlsvu..} {..dlhdu..} {..dlcep..}</td>
    <td class="small" width="15%" valign="top" align="left">{..anmeldung..}</td>
    <td class="small" width="15%" valign="top" align="left">{..maxplayer..}</td>
    <td class="small" width="15%" valign="top" align="left">{..maxlevel..}</td>
  </tr>
  <tr>
    <td colspan="7"><br></td>
  </tr>
<!--section-end::list_entry-->


<!--section-start::detail_body-->
<div align="center"><h2>Persistente Welt - Detailseite</h2></div>
<p>
  <table border="0" cellpadding="4" cellspacing="0" width="100%">
    <tr>
      <td align="left" valign="top" width="20%">
        Name:
      </td>
      <td align="left" valign="top" width="*">
        <a href="{..url..}" target="_blank">{..name..}</a>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Beschreibung:
      </td>
      <td align="left" valign="top">
        {..text..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Spiel:
      </td>
      <td align="left" valign="top">
        {..spiel..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Setting:
      </td>
      <td align="left" valign="top">
        {..setting..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Genre:
      </td>
      <td align="left" valign="top">
        {..genre..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        PvP:
      </td>
      <td align="left" valign="top">
        {..pvp..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Online-Termine:
      </td>
      <td align="left" valign="top">
        {..termine..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Notwendige Downloads:
      </td>
      <td align="left" valign="top">
        {..dlsize..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        notwendige Erweiterungen:
      </td>
      <td align="left" valign="top">
        {..dlsvu..} {..dlhdu..} {..dlcep..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Anmeldung ab:
      </td>
      <td align="left" valign="top">
        {..anmeldung..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Beschr&auml;nkungen:
      </td>
      <td align="left" valign="top">
        {..handycap..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Anzahl der Spielleiter:
      </td>
      <td align="left" valign="top">
        {..dungeonmaster..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Maximale Spieleranzahl:
      </td>
      <td align="left" valign="top">
        {..maxplayer..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Maximal erreichbares Level:
      </td>
      <td align="left" valign="top">
        {..maxlevel..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Beschr&auml;nkung der Erfahrungspunkte:
      </td>
      <td align="left" valign="top">
        {..expcap..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        K&auml;mpfe:
      </td>
      <td align="left" valign="top">
        {..fights..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Fallen:
      </td>
      <td align="left" valign="top">
        {..traps..}
      </td>
    </tr>
    <tr>
      <td align="left" valign="top">
        Besondere oder seltene Items:
      </td>
      <td align="left" valign="top">
        {..items..}
      </td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top">
        {..interview..}
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <a href="?go=persistentedit&amp;pw={..link..}">Eintrag editieren</a>
      </td>
    </tr>
  </table>
  <br><br>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
	  <td align="left" class="font-10"><a href="{..kommentar_url..}">Kommentare ({..kommentar_anzahl..})</a></td>
      <td align="right" class="font-10">geschrieben von <a href="{..autor_profilurl..}">{..autor..}</a></td>
    </tr>
  </table>
</p>
<!--section-end::detail_body-->


<!--section-start::interview_detail_body-->
<div align="center"><h2>Interview</h2></div>
<p>
  <table width="100%" cellpadding="0" cellspacing="10" border="0">
    <tr>
	  <td colspan="2"><div align="center"></div>
	    {..autor..} stellt das Projekt der Persistenten Welt {..name..} vor.<strong><br>
	        </strong><br>
	  </td>
	</tr>
    <tr>
      <td width="60" align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Wie hei&szlig;t euer Server und wo findet man ihn?</strong></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">Unser Server hei&szlig;t {..name..} und er ist unter folgender URL zu finden: <a href="{..url..}" target="_blank">{..url..}</a>.<br><br></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Wie lange gibt es euren Server schon oder wann geht er online und zu welchen Zeiten ist er erreichbar?</strong></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort01..}<br><br></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><b>Braucht man eine Anmeldung oder Bewerbung, um auf eurem Server zu spielen und warum?</b></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort02..}<br><br></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Welche Zielgruppe wollt ihr ansprechen und welche Vorraussetzungen muss der Spieler mitbringen? (z.B.: Altersgruppe, Anf&auml;nger, Profis, Rollenspieler, Powergamer, Gelegenheits- und/oder Dauerspieler)</strong></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort03..}<br><br></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Welches Setting benutzt ihr und warum grade dieses? (z.B.: Forgotten  Realms, Planescape, Eberron, Wheel of Time, Vampire, World of Warcraft,  Das Schwarze Auge, Eigenes Setting)</strong></td>
    </tr>
    <tr>
      <td width="60" align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort04..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><b>Beschreibt in einigen S&auml;tzen das Konzept eures Servers.</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort05..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong> Welche besondere Features sind auf eurem Server zu finden? (z.B.: Handwerk, PvP-System)</strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort06..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><b>Was sind f&uuml;r euch die drei wichtigsten Aspekte einer Persistenten Welt?</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort07..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><b>Gibt es schon Zukunftspl&auml;ne für euren Server und wie sehen sie aus?</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort08..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><b> Wie ist euer Server entstanden?</b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort09..}<b><br><br></b></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Wie gro&szlig; ist euer Staff und sucht ihr weitere bestimmte Mitarbeiter?</strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort10..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Was gef&auml;llt euch so besonders an Neverwinter Nights?</strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort11..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong>Wie seht ihr NWN zum Vergleich von MMORPGs wie z.B. WoW, Everquest etc.? Welche Vor- und Nachteile gibt es?</strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort12..}<br><br></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>PNW:</b></td>
      <td align="left"><strong> Was w&uuml;rdet ihr machen, wenn ihr bei den Obsidian-Entwicklern einen Wunsch frei h&auml;ttet?</strong></td>
    </tr>
    <tr>
      <td align="left" valign="top"><b>{..autor..}:</b></td>
      <td align="left">{..antwort13..}<br><br></td>
    </tr>
    <tr>
      <td width="60" valign="top"><b>PNW:</b></td>
      <td><strong>Vielen Dank f&uuml;r das Interview. Wir w&uuml;nschen eurer Persistenten Welt viel Erfolg.</strong></td>
    </tr>
  </table>
  <br><br>
  <table width="100%" cellpadding="0" cellspacing="0" border="0">
    <tr>
	  <td align="left" class="font-10"></td>
      <td align="right" class="font-10">geschrieben von <a href="{..autor_profilurl..}">{..autor..}</a></td>
    </tr>
  </table>
</p>
<!--section-end::interview_detail_body-->