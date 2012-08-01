<?php
/**
 * Internationalisation for TranslateSVG extension
 *
 * @file
 * @ingroup Extensions
 */
 
$messages = array();

/** English
 * @author jarry1250
 */
$messages['en'] = array(
	'translatesvg-desc' => 'Provides a native-style interface for translating SVGs in line with the SVG1.1 specification',

	'translate-taskui-export-as-svg' => 'Save back to original SVG file',
	'translate-svg-nodesc' => '(No file description was provided.)',
	'translate-svg-js-thumbnail' => '(thumbnail updates automatically)',
	'translate-page-description-legend-svgmg' => 'Information about this file',
	'translate-taction-mstats-svgmg' => 'File statistics',
	'translate-taction-export-svgmg' => 'Upload updated version of file',
	'translate-svg-table-header' => 'Message identifier',
	'translate-svg-filepage-caption' => 'This image rendered as PNG in other languages: $1',
	'translate-svg-filepage-caption-translator' => 'This image rendered as PNG in other languages: $1; or translate it into $2',
	'translate-svg-filepage-edit' => 'edit',
	'translate-svg-filepage-finish' => 'finish',
	'translate-svg-filepage-another' => 'another language',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'This file can be easily translated into other languages: $1',
	'translate-svg-autocreate' => 'Automatically creating translation units based on changes to the source SVG file',
	'translate-svg-autodelete' => 'Automatically deleting unnecessary translation units based on changes to the source SVG file',
	'translate-svg-autoedit' => 'Automatically updating translations based on changes to the source SVG file',
	'translate-svg-autofuzzy' => 'Automatically marking translations as fuzzy based on changes to the source SVG file',
	'translate-svg-upload-comment' => 'Updating translations (started: $1; modified/expanded: $2)',
	'translate-svg-upload-none' => '(none)',
	'translate-svg-chooselanguage-title' => 'Language selection',
	'translate-svg-chooselanguage-desc' => 'Please select the language you wish you translate this SVG file into: ',

	# Labels for potential properties attached to strings
	'translate-js-properties-legend' => 'Properties',
	'translate-js-label-x' => 'X-coordinate:',
	'translate-js-label-y' => 'Y-coordinate:',
	'translate-js-label-color' => 'Color:',
	'translate-js-label-font-family' => 'Font:',
	'translate-js-label-font-size' => '',
	'translate-js-label-units' => '',
	'translate-js-label-bold' => 'Bold',
	'translate-js-label-italic' => 'Italic',
	'translate-js-label-underline' => 'Underline',
	'translate-js-font-family-inherit' => '(inherit)',
);

/** Message documentation (Message documentation)
 * @author jarry1250
 */
$messages['qqq'] = array(
	'translatesvg-desc' => '{{desc}}',
	'translate-taskui-export-as-svg' => 'Label for a radio button, not currently displayed since no other options',
	'translate-svg-nodesc' => 'Text that displays under the heading "Information about the file" if no information/description could be found.',
	'translate-svg-js-thumbnail' => 'Caption for a thumbnail that accompanies the translation of a string.',
	'translate-page-description-legend-svgmg' => 'Caption for a box that contains file description information.',
	'translate-taction-mstats-svgmg' => 'Interface message for a tab displayed at the top of the screen',
	'translate-taction-export-svgmg' => 'Interface message for a tab displayed at the top of the screen',
	'translate-svg-table-header' => 'Content for a column title/header cell',
	'translate-svg-filepage-caption' => 'Paragraph displayed on file description pages; $1 is a comma-separated list of languages',
	'translate-svg-filepage-caption-translator' => 'Paragraph displayed on file description pages; $1 and $2 are comma-separated lists of languages',
	'translate-svg-filepage-edit' => 'Call to action, used as link text',
	'translate-svg-filepage-finish' => 'Call to action, used as link text',
	'translate-svg-filepage-another' => 'Fragment, takes the place of a language name in a list; used as link text, links to a language selection dialog',
	'translate-svg-filepage-item' => 'The format for each item in a comma-separated list; $1 represents a language name, $2 a call to action.',
	'translate-svg-filepage-invite' => 'Paragraph displayed on file description pages; $1 is a comma-separated list of languages',
	'translate-svg-autocreate' => 'Edit summary used by a bot during page creation',
	'translate-svg-autodelete' => 'Log reason/summary used a bot during page deletion',
	'translate-svg-autoedit' => 'Edit summary used by a bot',
	'translate-svg-autofuzzy' => 'Edit summary used by a bot. "Fuzzy" here is a Extension:Translate term meaning "mark translations for review"',
	'translate-svg-upload-comment' => 'Upload summary used by a bot; $1 and $2 are comma-separated lists of languages',
	'translate-svg-upload-none' => 'Placeholder that replaces an empty comma-separated list of languages in an upload summary',
	'translate-svg-chooselanguage-title' => 'Title for a dialog box',
	'translate-svg-chooselanguage-desc' => 'Content of a modal dialog box, immediately followed a by a language drop-down selector',
	'translate-js-properties-legend' => 'The legend for a fieldset which contains property controls',
	'translate-js-label-x' => 'Label for textbox which sets the horizontal position of a string',
	'translate-js-label-y' => 'Label for a textbox which sets the vertical position of a string',
	'translate-js-label-color' => 'Label for a box which sets the (foreground) colour used for a string',
	'translate-js-label-font-family' => 'Label for a dropdown "combobox" which sets the typeface used in a string',
	'translate-js-label-bold' => 'Label for a checkbox governing the formatting of a string',
	'translate-js-label-italic' => 'Label for a checkbox governing the formatting of a string',
	'translate-js-label-underline' => 'Label for a checkbox governing the formatting of a string',
	'translate-js-font-family-inherit' => 'Label used to imply that no specific typeface will be set for a string; instead, it will be inherited from the document default.',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'translatesvg-desc' => "Ufre una interfaz d'estilu nativu pa traducir en llinia ficheros SVG cola especificación SVG1.1.",
);

/** Belarusian (Taraškievica orthography) (‪беларуская (тарашкевіца)‬)
 * @author EugeneZelenko
 * @author Wizardist
 */
$messages['be-tarask'] = array(
	'translatesvg-desc' => 'Надае інтэрфэйс для перакладу SVG-файлаў, узгодненых са спэцыфікацыяй SVG1.1',
	'translate-svg-nodesc' => '(Гэты файл ня мае апісаньня.)',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'translatesvg-desc' => 'Ergänzt eine Spezialseite mit der SVG-Dateien in Einklang mit den SVG1.1-Spezifikationen übersetzt werden können',
	'translate-taskui-export-as-svg' => 'Zur originalen SVG-Datei zurücksichern',
	'translate-svg-nodesc' => '(Es wurde keine Dateibeschreibung angegeben.)',
	'translate-svg-js-thumbnail' => '(Vorschaubild wird automatisch aktualisiert)',
	'translate-page-description-legend-svgmg' => 'Informationen über diese Datei',
	'translate-taction-mstats-svgmg' => 'Dateistatistiken',
	'translate-taction-export-svgmg' => 'Aktualisierte Version der Datei hochladen',
	'translate-svg-table-header' => 'Nachrichtenkennung',
	'translate-svg-filepage-caption' => 'Dieses Bild als PNG in anderen Sprachen: $1',
	'translate-svg-filepage-caption-translator' => 'Dieses Bild als PNG in anderen Sprachen: $1; oder übersetzen in $2',
	'translate-svg-filepage-edit' => 'bearbeiten',
	'translate-svg-filepage-finish' => 'beenden',
	'translate-svg-filepage-another' => 'eine andere Sprache',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'Diese Datei kann einfach in andere Sprachen übersetzt werden: $1',
	'translate-svg-autocreate' => 'Übersetzungseinheiten automatisch erstellen, basierend auf Änderungen der Quell-SVG-Datei',
	'translate-svg-autodelete' => 'Unnötige Übersetzungseinheiten automatisch löschen, basierend auf Änderungen der Quell-SVG-Datei',
	'translate-svg-autoedit' => 'Übersetzungen automatisch aktualisieren, basierend auf Änderungen der Quell-SVG-Datei',
	'translate-svg-autofuzzy' => 'Übersetzungen automatisch als veraltet markieren, basierend auf Änderungen der Quell-SVG-Datei',
	'translate-svg-upload-comment' => 'Aktualisiere Übersetzungen (gestartet: $1; geändert/erweitert: $2)',
	'translate-svg-upload-none' => '(keine)',
	'translate-svg-chooselanguage-title' => 'Sprachauswahl',
	'translate-svg-chooselanguage-desc' => 'Bitte wähle die Sprache aus, in der du diese SVG-Datei übersetzen willst:',
	'translate-js-properties-legend' => 'Attribute',
	'translate-js-label-x' => 'X-Koordinate:',
	'translate-js-label-y' => 'Y-Koordinate:',
	'translate-js-label-color' => 'Farbe:',
	'translate-js-label-font-family' => 'Schriftart:',
	'translate-js-label-bold' => 'Fett',
	'translate-js-label-italic' => 'Kursiv',
	'translate-js-label-underline' => 'Unterstreichen',
	'translate-js-font-family-inherit' => '(erben)',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translatesvg-desc' => 'Stoj pówjerch za pśełožowanje SVG-datajow pó specifikaciji SVG1.1 k dispoziciji',
	'translate-svg-nodesc' => '(Toś ta dataja njama wopisanje.)',
);

/** Spanish (español)
 * @author Armando-Martin
 */
$messages['es'] = array(
	'translatesvg-desc' => 'Proporciona una interfaz de estilo nativo para traducir archivos SVG en consonancia con la especificación SVG1.1',
	'translate-svg-nodesc' => '(No se ha suministrado ninguna descripción de archivo).',
);

/** Persian (فارسی)
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'translatesvg-desc' => 'رابطی بومی برای ترجمهٔ اس‌وی‌جی‌ها با مشخصات SVG1.1 فراهم می‌کند',
);

/** French (français)
 * @author Gomoko
 * @author Od1n
 */
$messages['fr'] = array(
	'translatesvg-desc' => 'Fournit une interface de style natif pour traduire les SVGs en ligne conformément à la spécification SVG1.1',
	'translate-svg-nodesc' => "(Ce fichier n'a pas de description.)",
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'translatesvg-desc' => 'Proporciona unha inteface de estilo nativa para a tradución de ficheiros SVG en liña coa especificación SVG1.1.',
	'translate-svg-nodesc' => '(Este ficheiro aínda non ten unha descrición.)',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'translatesvg-desc' => 'מתן ממשק ילידי לתרגום קובצי SVG בהתאם לתקן SVG1.1',
	'translate-svg-nodesc' => '(לקובץ הזה אין תיאור.)',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'translatesvg-desc' => 'Steji powjerch za přełožowanje SVG-datajow po specifikaciji SVG1.1 k dispoziciji',
	'translate-svg-nodesc' => '(Tuta dataja nima wopisanje.)',
);

/** Hungarian (magyar)
 * @author TK-999
 */
$messages['hu'] = array(
	'translatesvg-desc' => 'Natív stílusú felületet biztosít az SVG vektorgrafikák fordítására az SVG 1.1 szabvány értelmében',
	'translate-svg-nodesc' => '(Ennek a fájlnak nincs leírása.)',
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'translatesvg-desc' => 'Forni un interfacie in stilo native pro traducer SVGs de maniera conforme al specification SVG1.1',
	'translate-svg-nodesc' => '(Iste file non ha un description.)',
);

/** Italian (italiano)
 * @author Beta16
 */
$messages['it'] = array(
	'translatesvg-desc' => "Fornisce un'interfaccia nativa per tradurre SVG con le specifiche SVG1.1",
	'translate-svg-nodesc' => '(Questo file non ha una descrizione).',
);

/** Korean (한국어)
 * @author Kwj2772
 */
$messages['ko'] = array(
	'translatesvg-desc' => 'SVG 1.1 규격에 따라 SVG 파일을 번역하는 인터페이스를 제공',
	'translate-svg-nodesc' => '(이 파일은 설명이 없습니다.)',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'translatesvg-desc' => 'Дава поредник за преведување на SVG податотеки во склад со одредбите на SVG1.1',
	'translate-svg-nodesc' => '(Оваа податотека нема опис.)',
);

/** Malay (Bahasa Melayu)
 * @author Anakmalaysia
 */
$messages['ms'] = array(
	'translatesvg-desc' => 'Menyediakan antaramuka bergaya natif untuk menterjemah SVG sejajar dengan tentuan SVG1.1',
);

/** Dutch (Nederlands)
 * @author AvatarTeam
 * @author SPQRobin
 * @author Siebrand
 */
$messages['nl'] = array(
	'translatesvg-desc' => 'Biedt een interface voor het vertalen van SVG-bestanden in het bestand zelf volgens de SVG1.1-specificatie',
	'translate-svg-nodesc' => '(Dit bestand heeft geen beschrijving.)',
);

/** Pälzisch (Pälzisch)
 * @author Manuae
 */
$messages['pfl'] = array(
	'translatesvg-desc' => 'Hodä nadirlischi Schniddschdell fas Iwasedze vun SVG-Dadaije im Oinglong midde Oagab SVG1.1',
);

/** Russian (русский)
 * @author Express2000
 */
$messages['ru'] = array(
	'translatesvg-desc' => 'Предоставляет перевод файлов SVG в соответствии со спецификацией SVG1.1',
);

/** Swedish (svenska) */
$messages['sv'] = array(
	'translate-svg-nodesc' => '(Denna fil har inte en beskrivning.)',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'translatesvg-desc' => 'Nagbibigay ng isang ugnayang-mukha na nasa katutubong estilo para sa pagsasalinwika ng mga SVG na nakaalinsundo sa pagkakatukoy ng SVG1.1',
	'translate-taskui-export-as-svg' => 'Sagiping pabalik sa orihinal na talaksan ng SVG',
	'translate-svg-nodesc' => '(Walang ibinigay na paglalarawan ng talaksan.)',
	'translate-svg-js-thumbnail' => '(kusang nagsasapanahon ang kagyat)',
	'translate-page-description-legend-svgmg' => 'Kabatirang patungkol sa talaksang ito',
	'translate-taction-mstats-svgmg' => 'Estadistika ng talaksan',
	'translate-taction-export-svgmg' => 'Ikargang paitaas ang naisapanahong bersiyon ng talaksan',
	'translate-svg-table-header' => 'Pangkilala ng mensahe',
	'translate-svg-filepage-caption' => 'Ang imaheng ito ay iniharap bilang PNG sa ibang mga wika: $1',
	'translate-svg-filepage-caption-translator' => 'Ang imaheng ito ay iniharap bilang PNG sa ibang mga wika: $1; o isalinwika ito upang maging $2',
	'translate-svg-filepage-edit' => 'baguhin',
	'translate-svg-filepage-finish' => 'tapusin',
	'translate-svg-filepage-another' => 'iba pang wika',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'Ang talaksang ito ay maaaring maginhawang maisalinwika papunta sa ibang mga wika: $1',
	'translate-svg-autocreate' => 'Kusang lumilikha ng mga yunit ng salinwika na nakabatay sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-autodelete' => 'Kusang binubura ang hindi kailangang mga yunit ng salinwika na naaayon sa mga pagbabago sa pinagmulang talaksan ng SVG',
	'translate-svg-autoedit' => 'Kusang nagsasapanahon ng mga salinwika na nakabatay sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-autofuzzy' => 'Kusang minamarkahan ang mga salinwika bilang malabo na naaayon sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-upload-comment' => 'Isinasapanahon ang mga salinwika (sinimulan: $1; binago/pinalawig: $2)',
	'translate-svg-upload-none' => '(wala)',
	'translate-svg-chooselanguage-title' => 'Pilian ng wika',
	'translate-svg-chooselanguage-desc' => 'Paki piliin ang wikang nais mong pagsalinan ng wika ng talaksang SVG:',
	'translate-js-properties-legend' => 'Mga kaarian',
	'translate-js-label-x' => 'tugma ng X:',
	'translate-js-label-y' => 'tugma ng Y:',
	'translate-js-label-color' => 'Kulay:',
	'translate-js-label-font-family' => 'Estilo ng titik:',
	'translate-js-label-bold' => 'Makapal',
	'translate-js-label-italic' => 'Pahilis',
	'translate-js-label-underline' => 'Salungguhitan',
	'translate-js-font-family-inherit' => '(manahin)',
);

/** Ukrainian (українська)
 * @author Olvin
 */
$messages['uk'] = array(
	'translatesvg-desc' => 'Забезпечує звичний інтерфейс для перекладу файлів .SVG у відповідності до специфікації SVG1.1',
);

