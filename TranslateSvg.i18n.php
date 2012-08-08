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
 * @author Jarry1250
 * @author Kghbln
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
	'translate-svg-filepage-caption-translator' => 'Paragraph displayed on file description pages; $1 and $2 are comma-separated lists of languages (the generic text "another language" may appear as an item in $2).',
	'translate-svg-filepage-edit' => 'Call to action, used as link text',
	'translate-svg-filepage-finish' => 'Call to action, used as link text',
	'translate-svg-filepage-another' => 'Fragment, takes the place of a language name in a list; used as link text, links to a language selection dialog',
	'translate-svg-filepage-item' => 'The format for each item in a comma-separated list; $1 represents a language name, $2 a call to action.

{{optional}}',
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
	'translate-taskui-export-as-svg' => 'Захаваць у першапачатковы SVG-файл',
	'translate-svg-nodesc' => '(Апісаньне не было пададзенае.)',
	'translate-svg-js-thumbnail' => '(мініяцюра абнаўляецца аўтаматычна)',
	'translate-page-description-legend-svgmg' => 'Інфармацыя пра файл',
	'translate-taction-mstats-svgmg' => 'Статыстыка файла',
	'translate-taction-export-svgmg' => 'Захаваць абноўленую вэрсію',
	'translate-svg-table-header' => 'Ідэнтыфікатар паведамленьня',
	'translate-svg-filepage-caption' => 'Гэтая выява ў PNG на іншых мовах: $1',
	'translate-svg-filepage-caption-translator' => 'Гэтая выява ў PNG на іншых мовах: $1; для перакладу даступная $2',
	'translate-svg-filepage-edit' => 'рэд.',
	'translate-svg-filepage-finish' => 'давяршыць',
	'translate-svg-filepage-another' => 'іншыя мовы',
	'translate-svg-filepage-invite' => 'Гэты файл можна лёгка перакласьці на іншыя мовы: $1',
	'translate-svg-autocreate' => 'Аўтаматычнае стварэньне адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autodelete' => 'Аўтаматычнае выдаленьне непатрэбных адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autoedit' => 'Аўтаматычнае абнаўленьне адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autofuzzy' => 'Аўтаматычнае пазначэньне адзінак перакладу як састарэлых, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-upload-comment' => 'Абнаўленьне перакладаў (пачата: $1; зьменена/пашырана: $2)',
	'translate-svg-upload-none' => '(няма)',
	'translate-svg-chooselanguage-title' => 'Выбар мовы',
	'translate-svg-chooselanguage-desc' => 'Калі ласка, выберыце мову, на якую жадаеце перакласьці гэты SVG-файл:',
	'translate-js-properties-legend' => 'Уласьцівасьці',
	'translate-js-label-x' => 'X-каардыната:',
	'translate-js-label-y' => 'Y-каардыната:',
	'translate-js-label-color' => 'Колер:',
	'translate-js-label-font-family' => 'Шрыфт:',
	'translate-js-label-bold' => 'Тоўсты',
	'translate-js-label-italic' => 'Курсіў',
	'translate-js-label-underline' => 'Падкрэсьлены',
	'translate-js-font-family-inherit' => '(спадкаваць)',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'translatesvg-desc' => 'Ergänzt eine Spezialseite mit der SVG-Dateien in Einklang mit den SVG1.1-Spezifikationen übersetzt werden können',
	'translate-taskui-export-as-svg' => 'Zur ursprünglichen SVG-Datei zurücksichern',
	'translate-svg-nodesc' => '(Es wurde keine Dateibeschreibung angegeben.)',
	'translate-svg-js-thumbnail' => '(Vorschaubild wird automatisch aktualisiert)',
	'translate-page-description-legend-svgmg' => 'Informationen über diese Datei',
	'translate-taction-mstats-svgmg' => 'Dateistatistiken',
	'translate-taction-export-svgmg' => 'Aktualisierte Version der Datei hochladen',
	'translate-svg-table-header' => 'Nachrichtenkennung',
	'translate-svg-filepage-caption' => 'Dieses Bild als PNG in anderen Sprachen: $1',
	'translate-svg-filepage-caption-translator' => 'Dieses Bild als PNG in anderen Sprachen: $1; oder übersetze es in $2',
	'translate-svg-filepage-edit' => 'bearbeiten',
	'translate-svg-filepage-finish' => 'beenden',
	'translate-svg-filepage-another' => 'eine andere Sprache',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'Diese Datei kann leicht in andere Sprachen übersetzt werden: $1',
	'translate-svg-autocreate' => 'Übersetzungseinheiten, basierend auf Änderungen an der Quell-SVG-Datei, automatisch erstellt',
	'translate-svg-autodelete' => 'Unnötige Übersetzungseinheiten, basierend auf Änderungen an der Quell-SVG-Datei, automatisch gelöscht',
	'translate-svg-autoedit' => 'Übersetzungen, basierend auf Änderungen an der Quell-SVG-Datei, automatisch aktualisiert',
	'translate-svg-autofuzzy' => 'Übersetzungen, basierend auf Änderungen an der Quell-SVG-Datei, automatisch als veraltet markiert',
	'translate-svg-upload-comment' => 'Aktualisiere Übersetzungen (gestartet: $1; geändert/erweitert: $2)',
	'translate-svg-upload-none' => '(keine)',
	'translate-svg-chooselanguage-title' => 'Sprachauswahl',
	'translate-svg-chooselanguage-desc' => 'Bitte wähle die Sprache aus, in die du diese SVG-Datei übersetzen möchtest:',
	'translate-js-properties-legend' => 'Attribute',
	'translate-js-label-x' => 'X-Koordinate:',
	'translate-js-label-y' => 'Y-Koordinate:',
	'translate-js-label-color' => 'Farbe:',
	'translate-js-label-font-family' => 'Schriftart:',
	'translate-js-label-bold' => 'Fett',
	'translate-js-label-italic' => 'Kursiv',
	'translate-js-label-underline' => 'Unterstrichen',
	'translate-js-font-family-inherit' => '(erben)',
);

/** German (formal address) (‪Deutsch (Sie-Form)‬)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'translate-svg-filepage-caption-translator' => 'Dieses Bild als PNG in anderen Sprachen: $1; oder übersetzen Sie es in $2',
	'translate-svg-chooselanguage-desc' => 'Bitte wählen Sie die Sprache aus, in die Sie diese SVG-Datei übersetzen möchten:',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translatesvg-desc' => 'Stoj pówjerch za pśełožowanje SVG-datajow pó specifikaciji SVG1.1 k dispoziciji',
	'translate-taskui-export-as-svg' => 'Slědk do spócetneje SVG-dataje składowaś',
	'translate-svg-nodesc' => '(Žedne datajowe wopisanje pódane.)',
	'translate-page-description-legend-svgmg' => 'Informacije wó toś tej dataji',
	'translate-taction-mstats-svgmg' => 'Datajowa statistika',
	'translate-taction-export-svgmg' => 'Zaktualizěrowanu wersiju dataje nagraś',
	'translate-svg-table-header' => 'Identifikator powěsći',
	'translate-svg-filepage-edit' => 'wobźěłaś',
	'translate-svg-filepage-finish' => 'skóńcyś',
	'translate-svg-filepage-another' => 'druga rěc',
	'translate-svg-upload-comment' => 'Pśełožki se aktualizěruju (startowane: $1; změnjone/rozšyrjone: $2)',
	'translate-svg-upload-none' => '(žedna)',
	'translate-svg-chooselanguage-title' => 'Wuběrk rěcow',
	'translate-svg-chooselanguage-desc' => 'Pšosym wubjeŕ rěc, do kótarejež coš toś tu sVG-dataju pśełožiś:',
	'translate-js-properties-legend' => 'Kakosći',
	'translate-js-label-x' => 'X-koordinata:',
	'translate-js-label-y' => 'X-koordinata:',
	'translate-js-label-color' => 'Barwa:',
	'translate-js-label-font-family' => 'Pismo:',
	'translate-js-label-bold' => 'Tucny',
	'translate-js-label-italic' => 'Kursiwny',
	'translate-js-label-underline' => 'Pódšmarnjony',
	'translate-js-font-family-inherit' => '(zderbnuś)',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Dferg
 * @author Jewbask
 */
$messages['es'] = array(
	'translatesvg-desc' => 'Proporciona una interfaz de estilo nativo para traducir archivos SVG en consonancia con la especificación SVG1.1',
	'translate-svg-nodesc' => '(No se ha suministrado ninguna descripción de archivo).',
	'translate-js-label-color' => 'Color:',
	'translate-js-label-font-family' => 'Tipo de letra',
	'translate-js-label-bold' => 'Negrita',
	'translate-js-label-italic' => 'Cursiva',
	'translate-js-label-underline' => 'Subrayado',
	'translate-js-font-family-inherit' => '(heredar)',
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
 * @author Tititou36
 */
$messages['fr'] = array(
	'translatesvg-desc' => 'Fournit une interface de style natif pour traduire les SVGs en ligne conformément à la spécification SVG1.1',
	'translate-svg-nodesc' => "(Ce fichier n'a pas de description.)",
	'translate-js-label-color' => 'Couleur :',
	'translate-js-label-font-family' => 'Police :',
	'translate-js-label-bold' => 'Gras',
	'translate-js-label-italic' => 'Italique',
	'translate-js-label-underline' => 'Souligné',
	'translate-js-font-family-inherit' => '(hérité)',
);

/** Galician (galego)
 * @author Toliño
 */
$messages['gl'] = array(
	'translatesvg-desc' => 'Proporciona unha inteface de estilo nativa para a tradución de ficheiros SVG en liña coa especificación SVG1.1.',
	'translate-svg-nodesc' => '(Non se deu descrición ningunha para este ficheiro.)',
	'translate-svg-js-thumbnail' => '(a miniatura actualízase automaticamente)',
	'translate-page-description-legend-svgmg' => 'Información acerca do ficheiro',
	'translate-taction-mstats-svgmg' => 'Estatísticas do ficheiro',
	'translate-svg-table-header' => 'Identificador da mensaxe',
	'translate-svg-filepage-edit' => 'editar',
	'translate-svg-filepage-finish' => 'rematar',
	'translate-svg-filepage-another' => 'outra lingua',
	'translate-svg-filepage-invite' => 'Este ficheiro pódese traducir facilmente a outras linguas: $1',
	'translate-svg-chooselanguage-title' => 'Selección da lingua',
	'translate-svg-chooselanguage-desc' => 'Seleccione a lingua á que queira traducir este ficheiro SVG:',
	'translate-js-properties-legend' => 'Propiedades',
	'translate-js-label-color' => 'Cor:',
	'translate-js-label-font-family' => 'Tipo de letra:',
	'translate-js-label-bold' => 'Negra',
	'translate-js-label-italic' => 'Cursiva',
	'translate-js-label-underline' => 'Subliñado',
);

/** Hebrew (עברית)
 * @author Amire80
 */
$messages['he'] = array(
	'translatesvg-desc' => 'מתן ממשק ילידי לתרגום קובצי SVG בהתאם לתקן SVG1.1',
	'translate-taskui-export-as-svg' => 'שמירה לקובץ ה־SVG המקורי',
	'translate-svg-nodesc' => '(לקובץ הזה אין תיאור.)',
	'translate-svg-js-thumbnail' => '(התמונה הממוזערת מתעדכנת אוטומטית.)',
	'translate-page-description-legend-svgmg' => 'מידע על הקובץ הזה',
	'translate-taction-mstats-svgmg' => 'סטטיסטיקות על הקובץ',
	'translate-taction-export-svgmg' => 'העלאת גרסה מעודכנת של הקובץ',
	'translate-svg-table-header' => 'מזהה הודעה',
	'translate-svg-filepage-caption' => 'הצגת הקובץ הזה כ־PNG בשפות אחרות: $1',
	'translate-svg-filepage-caption-translator' => 'אפשר להציג את הקובץ הזה כ־PNG בשפות אחרות: $1; ואפשר לתרגם אותו ל$2',
	'translate-svg-filepage-edit' => 'עריכה',
	'translate-svg-filepage-finish' => 'סיום',
	'translate-svg-filepage-another' => 'שפה אחרת',
	'translate-svg-filepage-invite' => 'אפשר לתרגם את הקובץ הזה בקלות לשפות אחרות: $1',
	'translate-svg-autocreate' => 'יצירה אוטומטית של יחידות תרגום בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autodelete' => 'מחיקה אוטומטית של יחידות תרגום לא נחוצות בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autoedit' => 'עדכון אוטומטי של תרגומים בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autofuzzy' => 'טשטוש אוטומטי של תרגומים (FUZZY) בהתאם לקובץ ה־SVG המקורי',
	'translate-svg-upload-comment' => 'עדכון תרגומים (התחלה: $1; שינוי או הרחבה: $2)',
	'translate-svg-upload-none' => '(אין)',
	'translate-svg-chooselanguage-title' => 'בחירת שפה',
	'translate-svg-chooselanguage-desc' => 'נא לבחור את השפה שברצונך לתרגם את קובץ ה־SVG הזה אליה:',
	'translate-js-properties-legend' => 'מאפיינים',
	'translate-js-label-x' => 'נקודת ציון על ציר X:',
	'translate-js-label-y' => 'נקודת ציון על ציר Y:',
	'translate-js-label-color' => 'צבע:',
	'translate-js-label-font-family' => 'גופן:',
	'translate-js-label-bold' => 'בולט',
	'translate-js-label-italic' => 'נטוי',
	'translate-js-label-underline' => 'קו תחתי',
	'translate-js-font-family-inherit' => '(בירושה)',
);

/** Upper Sorbian (hornjoserbsce)
 * @author Michawiki
 */
$messages['hsb'] = array(
	'translatesvg-desc' => 'Steji powjerch za přełožowanje SVG-datajow po specifikaciji SVG1.1 k dispoziciji',
	'translate-taskui-export-as-svg' => 'Do prěnjotneje SVG-dataje wróćo zawěsćić',
	'translate-svg-nodesc' => '(Žane datajowe wopisanje podate.)',
	'translate-svg-js-thumbnail' => '(Miniatura so awtomatisce aktualizuje)',
	'translate-page-description-legend-svgmg' => 'Informacije wo tutej dataji',
	'translate-taction-mstats-svgmg' => 'Datajowa statistika',
	'translate-taction-export-svgmg' => 'Zaktualizowanu wersiju dataje nahrać',
	'translate-svg-table-header' => 'Identifikator powěsće',
	'translate-svg-filepage-caption' => 'Tutón wobraz jako PNG w druhich rěčach: $1',
	'translate-svg-filepage-caption-translator' => 'Tutón wobraz jako PNG w druhich rěčach: $1; abo přełož jón do $2',
	'translate-svg-filepage-edit' => 'wobdźěłać',
	'translate-svg-filepage-finish' => 'skónčić',
	'translate-svg-filepage-another' => 'druha rěč',
	'translate-svg-filepage-invite' => 'Tuta dataja da so lochko do druhich rěčow přełožić: $1',
	'translate-svg-upload-comment' => 'Přełožki so aktualizuja (startowane: $1; změnjene/rozšěrjene: $2)',
	'translate-svg-upload-none' => '(žana)',
	'translate-svg-chooselanguage-title' => 'Wuběr rěčow',
	'translate-svg-chooselanguage-desc' => 'Prošu wubjerće rěč, do kotrejež chceš SVG-dataju přełožić:',
	'translate-js-properties-legend' => 'Kajkosće',
	'translate-js-label-x' => 'X-koordinata:',
	'translate-js-label-y' => 'Y-koordinata',
	'translate-js-label-color' => 'Barba:',
	'translate-js-label-font-family' => 'Pismo:',
	'translate-js-label-bold' => 'Tučny',
	'translate-js-label-italic' => 'Kursiwny',
	'translate-js-label-underline' => 'Podšmórnyć',
	'translate-js-font-family-inherit' => '(zdźědźić)',
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
 * @author 아라
 */
$messages['ko'] = array(
	'translatesvg-desc' => 'SVG 1.1 규격에 따라 SVG 파일을 번역하는 인터페이스를 제공',
	'translate-taskui-export-as-svg' => '원본 SVG 파일에 다시 저장',
	'translate-svg-nodesc' => '(이 파일은 설명을 제공하지 않았습니다.)',
	'translate-svg-js-thumbnail' => '(섬네일을 자동으로 업데이트함)',
	'translate-page-description-legend-svgmg' => '이 파일에 대한 정보',
	'translate-taction-mstats-svgmg' => '파일 통계',
	'translate-taction-export-svgmg' => '파일의 업데이트한 버전 올리기',
	'translate-svg-table-header' => '메시지 식별자',
	'translate-svg-filepage-caption' => '이 그림은 다른 언어에서 PNG로 렌더했습니다: $1',
	'translate-svg-filepage-caption-translator' => '이 그림은 다른 언어에서 PNG로 렌더했습니다: $1, 또는 $2로 이를 번역합니다',
	'translate-svg-filepage-edit' => '편집',
	'translate-svg-filepage-finish' => '완료',
	'translate-svg-filepage-another' => '다른 언어',
	'translate-svg-filepage-invite' => '이 파일은 다른 언어로 쉽게 번역할 수 있습니다: $1',
	'translate-svg-autocreate' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 번역 단위를 만듦',
	'translate-svg-autodelete' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 불필요한 번역 단위를 삭제함',
	'translate-svg-autoedit' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 번역 단위를 업데이트함',
	'translate-svg-autofuzzy' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 퍼지와 같은 번역을 표시함',
	'translate-svg-upload-comment' => '번역 업데이트 (시작: $1, 수정/확장: $2)',
	'translate-svg-upload-none' => '(없음)',
	'translate-svg-chooselanguage-title' => '언어 선택',
	'translate-svg-chooselanguage-desc' => '이 SVG 파일로 번역하고자 하는 언어를 선택하세요:',
	'translate-js-properties-legend' => '속성',
	'translate-js-label-x' => 'X-좌표:',
	'translate-js-label-y' => 'Y-좌표:',
	'translate-js-label-color' => '색상:',
	'translate-js-label-font-family' => '글꼴:',
	'translate-js-label-bold' => '굵은 글씨',
	'translate-js-label-italic' => '기울인 글씨',
	'translate-js-label-underline' => '밑줄 글씨',
	'translate-js-font-family-inherit' => '(상속)',
);

/** Macedonian (македонски)
 * @author Bjankuloski06
 */
$messages['mk'] = array(
	'translatesvg-desc' => 'Дава поредник за преведување на SVG податотеки во склад со одредбите на SVG1.1',
	'translate-taskui-export-as-svg' => 'Зачувај врз изворната SVG-податотека',
	'translate-svg-nodesc' => '(Податотеката нема опис.)',
	'translate-svg-js-thumbnail' => '(минијатурата се подновува сама)',
	'translate-page-description-legend-svgmg' => 'Информации за податотеката',
	'translate-taction-mstats-svgmg' => 'Податотечни статистики',
	'translate-taction-export-svgmg' => 'Подигни нова верзија на податотеката',
	'translate-svg-table-header' => 'Назнака на пораката',
	'translate-svg-filepage-caption' => 'Сликата во PNG-испис на други јазици: $1',
	'translate-svg-filepage-caption-translator' => 'Сликата во PNG-испис на други јазици: $1; или пак преведете ја на $2',
	'translate-svg-filepage-edit' => 'уреди',
	'translate-svg-filepage-finish' => 'заврши',
	'translate-svg-filepage-another' => 'друг јазик',
	'translate-svg-filepage-invite' => 'Оваа податотека може лесно да се преведува на други јазици: $1',
	'translate-svg-autocreate' => 'Автоматско создавање на преводни единици согласно измените на изворната податотека',
	'translate-svg-autodelete' => 'Автоматско бришење на непотребни преводни единици согласно измените на изворната податотека',
	'translate-svg-autoedit' => 'Автоматска поднова на преводите согласно измените на изворната податотека',
	'translate-svg-autofuzzy' => 'Автоматско означување на преводите како застарени согласно измените на изворната податотека',
	'translate-svg-upload-comment' => 'Поднова на преводите (првично: $1; изменето/проширено: $2)',
	'translate-svg-upload-none' => '(нема)',
	'translate-svg-chooselanguage-title' => 'Избор на јазик',
	'translate-svg-chooselanguage-desc' => 'Изберете на коој јазик сакате да ја преведете податотеката:',
	'translate-js-properties-legend' => 'Својства',
	'translate-js-label-x' => 'X-координата:',
	'translate-js-label-y' => 'Y-координата:',
	'translate-js-label-color' => 'Боја:',
	'translate-js-label-font-family' => 'Фонт:',
	'translate-js-label-bold' => 'Задебелено',
	'translate-js-label-italic' => 'Закосено',
	'translate-js-label-underline' => 'Потцртано',
	'translate-js-font-family-inherit' => '(усвој од документот)',
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
	'translate-taskui-export-as-svg' => 'Opslaan in het oorspronkelijke SVG-bestand',
	'translate-svg-nodesc' => 'Dit bestand heeft geen beschrijving.',
	'translate-svg-js-thumbnail' => '(miniatuur wordt automatisch bijgewerkt)',
	'translate-page-description-legend-svgmg' => 'Gegevens over dit bestand',
	'translate-taction-mstats-svgmg' => 'Bestandstatistieken',
	'translate-taction-export-svgmg' => 'Bijgewerkte versie van het bestand uploaden',
	'translate-svg-filepage-caption' => 'Deze afbeelding weergegeven als PNG in andere talen: $1',
	'translate-svg-filepage-caption-translator' => 'Deze afbeelding weergegeven als PNG in andere talen: $1; of vertaal de afbeelding in: $2',
	'translate-svg-filepage-edit' => 'bewerken',
	'translate-svg-filepage-finish' => 'afronden',
	'translate-svg-filepage-another' => 'een andere taal',
	'translate-svg-filepage-invite' => 'Dit bestand kan gemakkelijk vertaald worden in andere talen: $1',
	'translate-svg-upload-none' => '(geen)',
	'translate-svg-chooselanguage-title' => 'Taalselectie',
	'translate-svg-chooselanguage-desc' => 'Selecteer de taal waar u dit SVG-bestand in wilt vertalen:',
	'translate-js-properties-legend' => 'Eigenschappen',
	'translate-js-label-x' => 'X-coördinaat:',
	'translate-js-label-y' => 'Y-coördinaat:',
	'translate-js-label-color' => 'Kleur:',
	'translate-js-label-font-family' => 'Lettertype:',
	'translate-js-label-bold' => 'Vet',
	'translate-js-label-italic' => 'Cursief',
	'translate-js-label-underline' => 'Onderstrepen',
	'translate-js-font-family-inherit' => '(overnemen)',
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

