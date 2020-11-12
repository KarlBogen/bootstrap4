<?php
$font_text['de'] = '
	<div class="font-desc">
	<h3>Anleitung: Zus&auml;tzliche Schriftart "DSGVO-konform" einbinden</h3>
    <p><i>DSGVO ist Datenschutz-Grundverordnung der Europäischen Union</i></p>
	<p>Am einfachsten geht dies über die Website <a href="https://google-webfonts-helper.herokuapp.com/fonts" target="_blank" rel="noopener">Google Webfonts Helper</a>.</p>
	<h4>Der Google Webfonts Helper am Beispiel "Open Sans"</h4>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts1.png" class="img-fluid" alt="Modified2" />
	<p>Im linken Bereich die Schriftart "Open Sans" auswählen und im rechten Bereich die Feineinstellungen erledigen:</p>
	<p><strong>1. Zeichensatz</strong><br /> <em>Latin</em> ist für eine mitteleuropäische Website die richtige Wahl.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts2.png" class="img-fluid" alt="Modified2" />
	<p><strong>2. Schriftstile</strong><br /> Das Bootstrap4-Framework arbeitet mit den Schriftstilen 300, 400 und 700.<br />Diese Stile (regular entspricht 400) markieren.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts3.png" class="img-fluid" alt="Modified2" />
	<p><strong>3. CSS-Code kopieren</strong><br /> Button <em>„Best Support“</em> anklicken.</p>
	<p>Darauf achten, dass im Feld <em>„Customize folder prefix (optional):"</em> der Wert <strong>../fonts/</strong> eingetragen ist.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts4.png" class="img-fluid" alt="Modified2" />
	<p>Durch Klick in das graue Codefeld werden die CSS-Anweisungen markiert.<br />Diesen Abschnitt kopieren (z.B. mittels Tastenkombination "Strg + C") und im Template Manager in das Feld <strong>CSS-Anweisung der Schriftart:</strong> kopieren (z.B. mittels Tastenkombination "Strg + V").</p>
	<p>Wichtig im kopierten Code ist die Bezeichnung der "font-family":</p>
	<p>@font-face {<br /> font-family: \'Open Sans\';<br /> font-style: normal;<br /> font-weight: 300;</p>
	<p>&nbsp;Den dort genannten Namen der Schrift&nbsp;<strong><em>Open Sans</em></strong> im Template Manager in das Feld <strong>Name der Schriftart:</strong> eintragen.</p>
	<p><strong>4. Dateien herunterladen</strong></p>
	<p>Dateien herunterladen, entpacken und in den Ordner <strong>templates/bootstrap4/css/fonts/</strong> kopieren.<br>
	Das Dateiverzeichnis sollte nun so aussehen.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts5.png" class="img-fluid" alt="Modified2" />
	<p>Theme-Einstellungen aktualisieren/speichern.</p>
	</div>';

$font_text['en'] = '
	<div class="font-desc">
	<h3>Instructions: Include additional font "DSGVO-compliant"</h3>
    <p><i>DSGVO means Regulation of data protection of the European Union</i></p>
	<p>The easiest way is via the website <a href="https://google-webfonts-helper.herokuapp.com/fonts" target="_blank" rel="noopener">Google Webfonts Helper</a>.</p>
	<h4>The Google webfonts helper by example "Open Sans"</h4>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts1.png" class="img-fluid" alt="Modified2" />
	<p>Select the font "Open Sans" in the left area and make the fine adjustments in the right area:</p>
	<p><strong>1. Select charsets</strong><br /> <em>Latin</em>is the right choice for a Central European website.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts2.png" class="img-fluid" alt="Modified2" />
	<p><strong>2. Select styles</strong><br /> The Bootstrap4 framework uses the font styles 300, 400, and 700.<br />Mark these styles (regular equals 400).</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts3.png" class="img-fluid" alt="Modified2" />
	<p><strong>3. Copy CSS</strong><br /> Click button <em>„Best Support“</em>.</p>
	<p>Be careful that the value in the field <em>„Customize folder prefix (optional):"</em> is <strong>../fonts/</strong>.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts4.png" class="img-fluid" alt="Modified2" />
	<p>Click on code to select all statements, then copy/paste it into the Template Manager field <strong>CSS code of the font</strong>.</p>
	<p>Important in the copied code is the name of the "font-family":</p>
	<p>@font-face {<br /> font-family: \'Open Sans\';<br /> font-style: normal;<br /> font-weight: 300;</p>
	<p>&nbsp;Enter the name of the font&nbsp;<strong><em>Open Sans</em></strong> in Template Manager field <strong>Name of the font</strong>.</p>
	<p><strong>4. Download files</strong></p>
	<p>Download files, unzip and copy all files in the folder <strong>templates/bootstrap4/css/fonts/</strong>.<br>
	The file directory should now look like this.</p>
	<img src="includes/bs4_template_manager/assets/img/bs4_fonts5.png" class="img-fluid" alt="Modified2" />
	<p>Update / save theme settings.</p>
	</div>';

?>