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
	'translate-svg-thumbnail' => 'Original file',
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
	'translate-svg-filepage-other' => 'other languages',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'This file can be easily translated into $1',
	'translate-svg-autocreate' => 'Automatically creating translation units based on changes to the source SVG file',
	'translate-svg-autodelete' => 'Automatically deleting unnecessary translation units based on changes to the source SVG file',
	'translate-svg-autoedit' => 'Automatically updating translations based on changes to the source SVG file',
	'translate-svg-autofuzzy' => 'Automatically marking translations as fuzzy based on changes to the source SVG file',
	'translate-svg-upload-comment' => 'Updating translations (started: $1; modified/expanded: $2)',
	'translate-svg-upload-none' => '(none)',
	'translate-svg-chooselanguage-title' => 'Language selection',
	'translate-svg-chooselanguage-desc' => 'Please select the language you wish you translate this SVG file into:',
	'translate-svg-instructions-title' => 'First time translating an SVG file this way?',
	'translate-svg-instructions-desc' => 'To get started, click on a message identifier in first column of the table provided to begin translation of that message, using the "$1" and "$2" buttons to help navigate through the messages requiring translation. When you\'re done, remember to use the "$3" tab to save your translations back to the original file.',
	'translate-svg-warn' => '<strong>Warning:</strong> There are currently unsaved translations in this language, which will not be visible until you or someone else $1.',
	'translate-svg-warn-inner' => 'saves those changes back to the original file',
	'translate-svg-new-title' => 'SVG translation',
	'translate-svg-new-summary' => "To begin translation of this file, please select the language you are translating this file '''from''' (if ambiguous, select the most widely spoken language).",
	'translate-svg-new-label' => 'Language:',
	'translate-svg-new-error-import' => "'''An error occurred:''' An unknown error occurred whilst trying to create the pages required for translating this SVG.",
	'translate-svg-new-error-group' => "'''An error occurred:''' An unknown error occurred; perhaps you forgot to specify a group in the URL?",

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
 * @author Siebrand
 * @author jarry1250
 */
$messages['qqq'] = array(
	'translatesvg-desc' => '{{desc}}',
	'translate-taskui-export-as-svg' => 'Label for a radio button, not currently displayed since no other options',
	'translate-svg-nodesc' => 'Text that displays under the heading "Information about the file" if no information/description could be found.',
	'translate-svg-thumbnail' => 'Caption for a thumbnail that appears immediately before any strings are translated.',
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
	'translate-svg-filepage-other' => 'Fragment, used as link text in [[MediaWiki:Translate-svg-filepage-invite]], links to a language selection dialog',
	'translate-svg-filepage-item' => 'The format for each item in a comma-separated list; $1 represents a language name, $2 a call to action.

{{optional}}',
	'translate-svg-filepage-invite' => 'Paragraph displayed on file description pages; $1 is a link with the text of {{msg-mw|translate-svg-filepage-other}}.',
	'translate-svg-autocreate' => 'Edit summary used by a bot during page creation',
	'translate-svg-autodelete' => 'Log reason/summary used a bot during page deletion',
	'translate-svg-autoedit' => 'Edit summary used by a bot',
	'translate-svg-autofuzzy' => 'Edit summary used by a bot. "Fuzzy" here is a Extension:Translate term meaning "mark translations for review"',
	'translate-svg-upload-comment' => 'Upload summary used by a bot. Parameters:
* $1 is a comma-separated lists of languages
* $2 is a comma-separated lists of languages',
	'translate-svg-upload-none' => 'Placeholder that replaces an empty comma-separated list of languages in an upload summary',
	'translate-svg-chooselanguage-title' => 'Title for a dialog box',
	'translate-svg-chooselanguage-desc' => 'Content of a modal dialog box, immediately followed a by a language drop-down selector',
	'translate-svg-instructions-title' => 'Title for a dialog box',
	'translate-svg-instructions-desc' => 'Content of a modal dialog box, offering advice to the user',
	'translate-svg-warn' => 'The content of a warning message. Parameters:
* $1 is a link, with the text of that link equal to the value of {{msg-mw|translate-svg-warn-inner}}.',
	'translate-svg-warn-inner' => 'The content of a link that forms part of another sentence (see {{msg-mw|translate-svg-warn}}.',
	'translate-svg-new-title' => 'Title of a specal page',
	'translate-svg-new-summary' => 'Introductory paragraph on a special page. Attention is drawn to the fact that the user is asked to provide the original language the file is being translated FROM, rather than the language they are translating it INTO.',
	'translate-svg-new-label' => 'Label for a dropdown list of languages',
	'translate-svg-new-error-import' => 'Text for a paragraph that appears whenever a certain type of error occurs',
	'translate-svg-new-error-group' => 'Text for a paragraph that appears whenever a certain type of error occurs',
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

/** Arabic (العربية)
 * @author Meno25
 */
$messages['ar'] = array(
	'translate-svg-thumbnail' => 'ملف أصلي',
	'translate-taction-mstats-svgmg' => 'إحصاءات الملف',
	'translate-svg-filepage-edit' => 'تعديل',
	'translate-svg-filepage-another' => 'لغة أخرى',
	'translate-svg-filepage-other' => 'لغات أخرى',
	'translate-svg-chooselanguage-title' => 'اختيار اللغة',
	'translate-js-properties-legend' => 'الخصائص',
	'translate-js-label-color' => 'اللون:',
	'translate-js-label-bold' => 'غليظ',
	'translate-js-label-italic' => 'مائل',
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
	'translate-svg-thumbnail' => 'Арыгінальны файл',
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
	'translate-svg-filepage-other' => 'іншыя мовы',
	'translate-svg-filepage-invite' => 'Гэты файл можна лёгка перакласьці на $1',
	'translate-svg-autocreate' => 'Аўтаматычнае стварэньне адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autodelete' => 'Аўтаматычнае выдаленьне непатрэбных адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autoedit' => 'Аўтаматычнае абнаўленьне адзінак перакладу, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-autofuzzy' => 'Аўтаматычнае пазначэньне адзінак перакладу як састарэлых, грунтуючыся на зьменах у зыходным SVG-файле',
	'translate-svg-upload-comment' => 'Абнаўленьне перакладаў (пачата: $1; зьменена/пашырана: $2)',
	'translate-svg-upload-none' => '(няма)',
	'translate-svg-chooselanguage-title' => 'Выбар мовы',
	'translate-svg-chooselanguage-desc' => 'Калі ласка, выберыце мову, на якую жадаеце перакласьці гэты SVG-файл:',
	'translate-svg-instructions-title' => 'Упершыню перакладаеце SVG-файл падобным чынам?',
	'translate-svg-new-title' => 'Пераклад SVG',
	'translate-svg-new-label' => 'Мова:',
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
	'translate-svg-thumbnail' => 'Originaldatei',
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
	'translate-svg-filepage-other' => 'andere Sprachen',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'Diese Datei kann leicht in die Sprache $1 übersetzt werden.',
	'translate-svg-autocreate' => 'Übersetzungseinheiten, basierend auf Änderungen an der Quell-SVG-Datei, automatisch erstellt',
	'translate-svg-autodelete' => 'Unnötige Übersetzungseinheiten, basierend auf Änderungen an der Quell-SVG-Datei, automatisch gelöscht',
	'translate-svg-autoedit' => 'Übersetzungen, basierend auf Änderungen an der Quell-SVG-Datei, automatisch aktualisiert',
	'translate-svg-autofuzzy' => 'Übersetzungen, basierend auf Änderungen an der Quell-SVG-Datei, automatisch als veraltet markiert',
	'translate-svg-upload-comment' => 'Aktualisiere Übersetzungen (gestartet: $1; geändert/erweitert: $2)',
	'translate-svg-upload-none' => '(keine)',
	'translate-svg-chooselanguage-title' => 'Sprachauswahl',
	'translate-svg-chooselanguage-desc' => 'Bitte wähle die Sprache aus, in die du diese SVG-Datei übersetzen möchtest:',
	'translate-svg-instructions-title' => 'Übersetzt du zum ersten Mal eine SVG-Datei auf diese Weise?',
	'translate-svg-instructions-desc' => 'Um mit der Übersetzung einer Nachricht zu beginnen, klicke auf eine Nachrichtenkennung in der ersten Spalte der Tabelle, verwende die Schaltflächen „$1“ und „$2“, um durch die Nachrichten zu navigieren, die eine Übersetzung erfordern. Wenn du fertig bist, vergiss nicht, die Registerkarte „$3“ zu benutzen, um deine Übersetzungen zur Originaldatei zurückzusichern.',
	'translate-svg-warn' => '<strong>Warnung:</strong> Deine Änderungen an der SVG-Datei werden nicht sichtbar sein, bis du $1. Mach dies sobald du mit dem Übersetzen der Datei fertig bist.',
	'translate-svg-warn-inner' => 'deine Änderungen zur Originaldatei zurücksichern',
	'translate-svg-new-title' => 'SVG-Übersetzung',
	'translate-svg-new-summary' => "Um mit der Übersetzung anfangen zu können, wähle zunächst die Sprache aus '''aus''' der du diese Datei übersetzt. Wähle die am meisten gesprochene Sprache, sofern keine Sprache eindeutig auswählbar ist.",
	'translate-svg-new-label' => 'Sprache:',
	'translate-svg-new-error-import' => "'''Es ist ein Fehler aufgetreten:''' Beim Erstellen der Seiten, die notwendig sind, um diese SVG-Datei übersetzen zu können, ist ein unbekannter Fehler aufgetreten.",
	'translate-svg-new-error-group' => "'''Es ist ein Fehler aufgetreten:''' Es ist ein unbekannter Fehler aufgetreten. Vielleicht hast du vergessen, in der URL eine Gruppe anzugeben?",
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
	'translate-svg-instructions-title' => 'Übersetzen Sie zum ersten Mal eine SVG-Datei auf diese Weise?',
	'translate-svg-warn' => '<strong>Warnung:</strong> Ihre Änderungen an der SVG-Datei werden nicht sichtbar sein, bis Sie $1. Machen Sie dies sobald Sie mit dem Übersetzen der Datei fertig sind.',
	'translate-svg-warn-inner' => 'Ihre Änderungen zur Originaldatei zurücksichern',
	'translate-svg-new-summary' => "Um mit der Übersetzung anfangen zu können, wählen Sie zunächst die Sprache aus '''aus''' der Sie diese Datei übersetzen. Wählen Sie die am meisten gesprochene Sprache, sofern keine Sprache eindeutig auswählbar ist.",
	'translate-svg-new-error-group' => "'''Es ist ein Fehler aufgetreten:''' Es ist ein unbekannter Fehler aufgetreten. Vielleicht haben Sie vergessen, in der URL eine Gruppe anzugeben?",
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

/** Estonian (eesti)
 * @author Avjoska
 */
$messages['et'] = array(
	'translate-js-label-x' => 'X-koordinaat:',
	'translate-js-label-y' => 'Y-koordinaat:',
	'translate-js-label-color' => 'Värv:',
	'translate-js-label-bold' => 'Rasvane kiri',
	'translate-js-label-italic' => 'Kaldkiri',
	'translate-js-label-underline' => 'Allajoonitud kiri',
);

/** Persian (فارسی)
 * @author ZxxZxxZ
 */
$messages['fa'] = array(
	'translatesvg-desc' => 'رابطی بومی برای ترجمهٔ اس‌وی‌جی‌ها با مشخصات SVG1.1 فراهم می‌کند',
);

/** French (français)
 * @author Brunoperel
 * @author Erkethan
 * @author Gomoko
 * @author Od1n
 * @author Tititou36
 */
$messages['fr'] = array(
	'translatesvg-desc' => 'Fournit une interface de style natif pour traduire les SVGs en ligne conformément à la spécification SVG1.1',
	'translate-taskui-export-as-svg' => "Enregistrer dans le fichier SVG d'origine",
	'translate-svg-nodesc' => "(Aucune description du fichier n'est fournie.)",
	'translate-svg-thumbnail' => "Fichier d'origine",
	'translate-svg-js-thumbnail' => '(la vignette se met à jour automatiquement)',
	'translate-page-description-legend-svgmg' => 'Informations sur ce fichier',
	'translate-taction-mstats-svgmg' => 'Statistiques du fichier',
	'translate-taction-export-svgmg' => 'Téléverse une nouvelle version du fichier',
	'translate-svg-table-header' => 'Identifiant du message',
	'translate-svg-filepage-edit' => 'modifier',
	'translate-svg-filepage-finish' => 'terminer',
	'translate-svg-filepage-another' => 'Autres langues',
	'translate-svg-filepage-other' => 'autres langues',
	'translate-svg-filepage-invite' => 'Ce fichier peut facilement être traduit en $1',
	'translate-svg-autoedit' => 'Mise à jour automatique des traductions, basée sur les modifications du fichier source SVG',
	'translate-svg-autofuzzy' => "Marquer automatiquement les traductions comme non fiables lorsque des changements ont été effectués sur le fichier SVG d'origine",
	'translate-svg-upload-comment' => 'Mise à jour des traductions (traductions commencées : $1 ; traductions modifiées ou étendues : $2 )',
	'translate-svg-upload-none' => '(aucun)',
	'translate-svg-chooselanguage-title' => 'Sélection de la langue',
	'translate-svg-chooselanguage-desc' => 'Veuillez sélectionner la langue dans laquelle vous souhaitez traduire ce fichier SVG :',
	'translate-svg-instructions-desc' => "Pour commencer, cliquez sur un identifiant de message dans la première colonne de la table afin de commencer la traduction de ce message, à l'aide des boutons « $1 « et » $2 » qui vous aideront à naviguer parmi les messages nécessitant une traduction. Lorsque vous avez terminé, n'oubliez pas d'utiliser l'onglet « $3 » pour enregistrer vos traductions dans le fichier d'origine.",
	'translate-svg-warn' => "<strong>Avertissement :</strong> Vos modifications sur le fichier SVG ne seront visibles qu'une fois que vous $1, ce que vous devez faire à chaque fois que vous terminez de traduire le fichier.",
	'translate-svg-warn-inner' => "enregistrer vos modifications dans le fichier d'origine",
	'translate-svg-new-title' => 'Traduction SVG',
	'translate-svg-new-summary' => "Pour commencer la traduction de ce fichier, veuillez sélectionner la langue '''à partir de laquelle''' vous traduisez ce fichier (si vous n'êtes pas certain(e) de la langue à indiquer, sélectionnez la langue plus utilisée).",
	'translate-svg-new-label' => 'Langue :',
	'translate-svg-new-error-import' => "''' Une erreur s'est produite ''': Une erreur inconnue s'est produite lors de la tentative de création des pages nécessaires pour traduire ce SVG.",
	'translate-svg-new-error-group' => "''' Une erreur s'est produite ''': Une erreur inconnue s'est produite ; vous avez peut-être oublié de spécifier un groupe dans l'URL ?",
	'translate-js-properties-legend' => 'Propriétés',
	'translate-js-label-x' => 'Coordonnée X :',
	'translate-js-label-y' => 'Coordonnée Y :',
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
	'translate-taskui-export-as-svg' => 'Gardar no ficheiro SVG orixinal',
	'translate-svg-nodesc' => '(Non se deu descrición ningunha para este ficheiro.)',
	'translate-svg-thumbnail' => 'Ficheiro orixinal',
	'translate-svg-js-thumbnail' => '(a miniatura actualízase automaticamente)',
	'translate-page-description-legend-svgmg' => 'Información acerca do ficheiro',
	'translate-taction-mstats-svgmg' => 'Estatísticas do ficheiro',
	'translate-taction-export-svgmg' => 'Cargar unha versión actualizada do ficheiro',
	'translate-svg-table-header' => 'Identificador da mensaxe',
	'translate-svg-filepage-caption' => 'Esta imaxe renderizada como PNG noutras linguas: $1',
	'translate-svg-filepage-caption-translator' => 'Esta imaxe renderizada como PNG noutras linguas: $1. Ou tradúzaa a $2',
	'translate-svg-filepage-edit' => 'editar',
	'translate-svg-filepage-finish' => 'rematar',
	'translate-svg-filepage-another' => 'outra lingua',
	'translate-svg-filepage-other' => 'outras linguas',
	'translate-svg-filepage-invite' => 'Este ficheiro pódese traducir facilmente a $1',
	'translate-svg-autocreate' => 'Creáronse automaticamente as unidades de tradución en base aos cambios feitos no ficheiro SVG orixinal',
	'translate-svg-autodelete' => 'Borráronse automaticamente as unidades de tradución non necesarias en base aos cambios feitos no ficheiro SVG orixinal',
	'translate-svg-autoedit' => 'Actualizáronse automaticamente as traducións en base aos cambios feitos no ficheiro SVG orixinal',
	'translate-svg-autofuzzy' => 'Marcáronse automaticamente as traducións para a súa revisión en base aos cambios feitos no ficheiro SVG orixinal',
	'translate-svg-upload-comment' => 'Actualización das traducións (comezouse: $1; modificouse/expandiuse: $2)',
	'translate-svg-upload-none' => '(ningunha)',
	'translate-svg-chooselanguage-title' => 'Selección da lingua',
	'translate-svg-chooselanguage-desc' => 'Seleccione a lingua á que queira traducir este ficheiro SVG:',
	'translate-svg-instructions-title' => 'É a primeira vez que traduce un ficheiro SVG deste modo?',
	'translate-svg-instructions-desc' => 'Para comezar, prema no identificador dunha mensaxe na primeira columna da táboa para comezar a tradución desa mensaxe. Pode usar os botóns "$1" e "$2" para navegar a través das mensaxes que necesitan tradución. Cando remate, lembre usar a lapela "$3" para gardar os cambios no ficheiro orixinal.',
	'translate-svg-warn' => '<strong>Atención:</strong> Os cambios feitos no ficheiro SVG non serán visibles ata que $1. Isto debería facelo en canto remate coa tradución do ficheiro.',
	'translate-svg-warn-inner' => 'garde os cambios no ficheiro orixinal',
	'translate-svg-new-title' => 'Tradución de ficheiros SVG',
	'translate-svg-new-summary' => "Para comezar a tradución deste ficheiro, seleccione a lingua '''desde''' a que vai realizar a tradución (se non sabe, seleccione a lingua máis falada).",
	'translate-svg-new-label' => 'Lingua:',
	'translate-svg-new-error-import' => "'''Houbo un erro:''' Produciuse un erro descoñecido ao intentar crear as páxinas necesarias para a tradución deste ficheiro SVG.",
	'translate-svg-new-error-group' => "'''Houbo un erro:''' Produciuse un erro descoñecido. Se cadra esqueceu especificar un grupo no enderezo URL.",
	'translate-js-properties-legend' => 'Propiedades',
	'translate-js-label-x' => 'Coordenada no eixo X:',
	'translate-js-label-y' => 'Coordenada no eixo Y:',
	'translate-js-label-color' => 'Cor:',
	'translate-js-label-font-family' => 'Tipo de letra:',
	'translate-js-label-bold' => 'Negra',
	'translate-js-label-italic' => 'Cursiva',
	'translate-js-label-underline' => 'Subliñado',
	'translate-js-font-family-inherit' => '(herdar)',
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
	'translate-svg-filepage-invite' => 'אפשר לתרגם את הקובץ הזה בקלות ל$1',
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
	'translate-svg-thumbnail' => 'Originalna dataja',
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
	'translate-svg-filepage-other' => 'druhich rěčow',
	'translate-svg-filepage-invite' => 'Tuta dataja da so lochko do $1 přełožić',
	'translate-svg-upload-comment' => 'Přełožki so aktualizuja (startowane: $1; změnjene/rozšěrjene: $2)',
	'translate-svg-upload-none' => '(žana)',
	'translate-svg-chooselanguage-title' => 'Wuběr rěčow',
	'translate-svg-chooselanguage-desc' => 'Prošu wubjerće rěč, do kotrejež chceš SVG-dataju přełožić:',
	'translate-svg-instructions-title' => 'Přełožuješ SVG-dataju prěni raz na tute wašnje?',
	'translate-svg-warn' => '<strong>Warnowanje:</strong> Twoje změny na SVG-dataji njebudú widźomne, doniž $1, štož ty měł činić, hdyž sy dataju dopřełožił.',
	'translate-svg-warn-inner' => 'twoje změny wróćo do originalneje dataje njeskładuješ',
	'translate-svg-new-title' => 'SVG-přełožk',
	'translate-svg-new-summary' => "Zo by přełožowanje započał, wubjer prošu rěč, '''z''' kotrejež přełožuješ (jeli to je njejasne, wubjer najwjace rěčanu rěč).",
	'translate-svg-new-label' => 'Rěč:',
	'translate-svg-new-error-import' => "'''Zmylk je wustupił:''' Njeznaty zmylk je wustupił, hdyž sy spytał, strony wutworić, kotrež su trěbne za přełožowanje tutoho SVG.",
	'translate-svg-new-error-group' => "'''Zmylk je wustupił:''' Njeznaty zmylk je wustupił: snano sy zabył, skupinu w URL podać?",
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
 * @author Darth Kule
 */
$messages['it'] = array(
	'translatesvg-desc' => "Fornisce un'interfaccia nativa per tradurre SVG con le specifiche SVG1.1",
	'translate-svg-nodesc' => '(Non è stata fornita una descrizione del file).',
	'translate-svg-thumbnail' => 'File originale',
	'translate-page-description-legend-svgmg' => 'Informazioni su questo file',
	'translate-svg-filepage-edit' => 'modifica',
	'translate-svg-filepage-another' => "un'altra lingua",
	'translate-svg-filepage-other' => 'altre lingue',
	'translate-svg-chooselanguage-title' => 'Selezione lingua',
	'translate-svg-new-label' => 'Lingua:',
	'translate-js-properties-legend' => 'Proprietà',
	'translate-js-label-x' => 'Coordinata x:',
	'translate-js-label-y' => 'Coordinata y:',
	'translate-js-label-color' => 'Colore:',
	'translate-js-label-font-family' => 'Tipo di carattere:',
	'translate-js-label-bold' => 'Grassetto',
	'translate-js-label-italic' => 'Corsivo',
	'translate-js-label-underline' => 'Sottolineato',
);

/** Georgian (ქართული)
 * @author David1010
 */
$messages['ka'] = array(
	'translate-svg-thumbnail' => 'საწყისი ფაილი',
	'translate-svg-js-thumbnail' => '(მინიატურის ავტომატური განახლება)',
	'translate-page-description-legend-svgmg' => 'ინფორმაცია ამ ფაილის შესახებ',
	'translate-taction-mstats-svgmg' => 'ფაილის სტატისტიკა',
	'translate-taction-export-svgmg' => 'ამ ფაილის განახლებული ვერსიის ატვირთვა',
	'translate-svg-filepage-edit' => 'რედაქტირება',
	'translate-svg-filepage-finish' => 'დასრულება',
	'translate-svg-filepage-other' => 'სხვა ენები',
	'translate-svg-upload-none' => '(არა)',
	'translate-svg-chooselanguage-title' => 'ენის არჩევა',
	'translate-svg-new-title' => 'SVG თარგმანი',
	'translate-svg-new-label' => 'ენა:',
	'translate-js-properties-legend' => 'პარამეტრები',
	'translate-js-label-x' => 'X-კოორდინატი:',
	'translate-js-label-y' => 'Y-კოორდინატი:',
	'translate-js-label-color' => 'ფერი:',
	'translate-js-label-font-family' => 'შრიფტი:',
	'translate-js-label-bold' => 'მუქი',
	'translate-js-label-italic' => 'კურსივი',
	'translate-js-label-underline' => 'ხაზის ქვეშ',
);

/** Korean (한국어)
 * @author Kwj2772
 * @author 아라
 */
$messages['ko'] = array(
	'translatesvg-desc' => 'SVG 1.1 규격에 따라 SVG 파일을 번역하는 인터페이스를 제공',
	'translate-taskui-export-as-svg' => '원본 SVG 파일에 다시 저장',
	'translate-svg-nodesc' => '(이 파일은 설명을 제공하지 않았습니다.)',
	'translate-svg-thumbnail' => '원본 파일',
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
	'translate-svg-filepage-other' => '다른 언어',
	'translate-svg-filepage-invite' => '이 파일은 쉽게 번역할 수 있습니다: $1',
	'translate-svg-autocreate' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 번역 단위를 만듦',
	'translate-svg-autodelete' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 불필요한 번역 단위를 삭제함',
	'translate-svg-autoedit' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 번역 단위를 업데이트함',
	'translate-svg-autofuzzy' => '자동으로 원본 SVG 파일에 대한 바뀜을 기반으로 퍼지와 같은 번역을 표시함',
	'translate-svg-upload-comment' => '번역 업데이트 (시작: $1, 수정/확장: $2)',
	'translate-svg-upload-none' => '(없음)',
	'translate-svg-chooselanguage-title' => '언어 선택',
	'translate-svg-chooselanguage-desc' => '이 SVG 파일로 번역하고자 하는 언어를 선택하세요:',
	'translate-svg-new-title' => 'SVG 번역',
	'translate-svg-new-label' => '언어:',
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
	'translate-svg-thumbnail' => 'Изворна податотека',
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
	'translate-svg-filepage-other' => 'други јазици',
	'translate-svg-filepage-invite' => 'Оваа податотека може лесно да се преведе на $1',
	'translate-svg-autocreate' => 'Автоматско создавање на преводни единици согласно измените на изворната податотека',
	'translate-svg-autodelete' => 'Автоматско бришење на непотребни преводни единици согласно измените на изворната податотека',
	'translate-svg-autoedit' => 'Автоматска поднова на преводите согласно измените на изворната податотека',
	'translate-svg-autofuzzy' => 'Автоматско означување на преводите како застарени согласно измените на изворната податотека',
	'translate-svg-upload-comment' => 'Поднова на преводите (првично: $1; изменето/проширено: $2)',
	'translate-svg-upload-none' => '(нема)',
	'translate-svg-chooselanguage-title' => 'Избор на јазик',
	'translate-svg-chooselanguage-desc' => 'Изберете на коој јазик сакате да ја преведете податотеката:',
	'translate-svg-instructions-title' => 'Дали ви е прв пат да преведувате SVG-податотека на овој начин?',
	'translate-svg-instructions-desc' => 'За да почнете со преведување на дадена порака, стиснете на назнаката на пораката во првата колона од табелата. Служете се со копчињта „$1“ и „$2“ за да се префрлате на следната порака. Кога ќе завршите, не заборавајте да се послужите со јазичето „$3“ за да ги зачувате преводите врз изворната податотека.',
	'translate-svg-warn' => '<strong>Предупредување:</strong> Вашите промени во SVG-податотеката нема да бидат видливи сè додека не ги $1, што треба да правите секој пат кога ќе завршите со преведувањето на секоја податотека.',
	'translate-svg-warn-inner' => 'зачувате промените врз изворната податотека',
	'translate-svg-new-title' => 'Превод на SVG',
	'translate-svg-new-summary' => "За да почнете со преведување на податотекава, најпрвин одберете '''од''' кој јазик ќе преведувате  (ако не е доволно јасно, одберете го најзастапениот јазик).",
	'translate-svg-new-label' => 'Јазик',
	'translate-svg-new-error-import' => "'''Се појави грешка''': Се појави непозната грешка при обидот да ги создадам страниците потребни за преведување на оваа SVG-податотека.",
	'translate-svg-new-error-group' => "'''Се појави грешка''': Се појави непозната грешка; да не заборавивте да укажете група во URL-адресата?",
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
	'translate-svg-thumbnail' => 'Oorspronkelijk bestand',
	'translate-svg-js-thumbnail' => '(miniatuur wordt automatisch bijgewerkt)',
	'translate-page-description-legend-svgmg' => 'Gegevens over dit bestand',
	'translate-taction-mstats-svgmg' => 'Bestandstatistieken',
	'translate-taction-export-svgmg' => 'Bijgewerkte versie van het bestand uploaden',
	'translate-svg-table-header' => 'Berichtidentificatie',
	'translate-svg-filepage-caption' => 'Deze afbeelding weergegeven als PNG in andere talen: $1',
	'translate-svg-filepage-caption-translator' => 'Deze afbeelding weergegeven als PNG in andere talen: $1; of vertaal de afbeelding in: $2',
	'translate-svg-filepage-edit' => 'bewerken',
	'translate-svg-filepage-finish' => 'afronden',
	'translate-svg-filepage-another' => 'een andere taal',
	'translate-svg-filepage-other' => 'andere talen',
	'translate-svg-filepage-invite' => 'Dit bestand kan gemakkelijk vertaald worden in $1',
	'translate-svg-autocreate' => 'Bezig met het automatisch aanmaken van de vertaaleenheden gebaseerd op de wijzigingen in het SVG-bestand',
	'translate-svg-autodelete' => 'Bezig met het automatisch verwijderen van onnodige vertaaleenheden gebaseerd op de wijzigingen in het SVG-bestand',
	'translate-svg-autoedit' => 'Bezig met het automatisch bijwerken van vertalingen gebaseerd op de wijzigingen in het SVG-bestand',
	'translate-svg-autofuzzy' => 'Bezig met het automatisch markeren van vertalingen als verouderd gebaseerd op de wijzigingen in het SVG-bestand',
	'translate-svg-upload-comment' => 'Bezig met het bijwerken van vertalingen (begonnen: $1; gewijzigd/uitgebreid: $2)',
	'translate-svg-upload-none' => '(geen)',
	'translate-svg-chooselanguage-title' => 'Taalselectie',
	'translate-svg-chooselanguage-desc' => 'Selecteer de taal waar u dit SVG-bestand in wilt vertalen:',
	'translate-svg-instructions-title' => 'Is dit de eerste keer dat u zo een SVG-bestand vertaalt?',
	'translate-svg-instructions-desc' => 'Klik op een bericht-ID in de eerste kolom van de tabel om te beginnen met het vertalen van die tekst. Gebruik de knoppen "$1" en "$2" om door de berichten te navigeren die vertaald kunnen worden. Gebruik het tabblad "$3" om uw vertalingen in het oorspronkelijke bestand op te slaan als u klaar bent.',
	'translate-svg-warn' => '<strong>Waarschuwing:</strong> Uw wijzigingen in het SVG-bestand zijn niet zichtbaar zijn totdat u $1. Doe dit als u klaar bent met vertalen.',
	'translate-svg-warn-inner' => 'uw wijzigingen opslaat in het oorspronkelijke bestand',
	'translate-svg-new-title' => 'SVG-vertaling',
	'translate-svg-new-summary' => "Selecteer de taal '''waaruit''' u dit bestand wilt vertalen om te beginnen met het vertalen van dit bestand. Als dit dubbelzinnig is, selecteer dan de meest gesproken taal.",
	'translate-svg-new-label' => 'Taal:',
	'translate-svg-new-error-import' => "'''Er is een fout opgetreden:''' er is een onbekende fout opgetreden tijdens het aanmaken van de pagina's die nodig zijn voor het vertalen van dit SVG-bestand.",
	'translate-svg-new-error-group' => "'''Er is een fout opgetreden:''' er is een onbekende fout opgetreden. Wellicht bent u vergeten een groep aan te geven in de URL?",
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

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'translate-svg-thumbnail' => 'آرنۍ دوتنه',
	'translate-svg-filepage-edit' => 'سمول',
	'translate-svg-filepage-finish' => 'پای',
	'translate-svg-filepage-another' => 'بله ژبه',
	'translate-svg-filepage-other' => 'نورې ژبې',
	'translate-svg-upload-none' => '(هېڅ)',
	'translate-svg-chooselanguage-title' => 'ژبه ټاکنه',
	'translate-svg-new-label' => 'ژبه:',
	'translate-js-properties-legend' => 'ځانتياوې',
	'translate-js-label-color' => 'رنګ:',
	'translate-js-label-font-family' => 'ليکبڼه:',
	'translate-js-label-bold' => 'زغرد',
	'translate-js-label-italic' => 'رېوند',
	'translate-js-label-underline' => 'کرښن',
);

/** Portuguese (português)
 * @author SandroHc
 */
$messages['pt'] = array(
	'translate-page-description-legend-svgmg' => 'Informação sobre este ficheiro',
	'translate-taction-mstats-svgmg' => 'Estatísticas do ficheiro',
	'translate-svg-filepage-edit' => 'editar',
	'translate-svg-filepage-finish' => 'finalizar',
	'translate-svg-filepage-another' => 'outra linguagem',
	'translate-svg-upload-none' => '(nenhum)',
	'translate-svg-chooselanguage-title' => 'Seleção de linguagem',
	'translate-js-properties-legend' => 'Propriedades',
	'translate-js-label-color' => 'Cor:',
	'translate-js-label-font-family' => 'Tipo de letra:',
	'translate-js-label-bold' => 'Negrito',
	'translate-js-label-italic' => 'Itálico',
	'translate-js-label-underline' => 'Sublinhado',
);

/** Romanian (română)
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'translate-svg-thumbnail' => 'Fișier original',
	'translate-page-description-legend-svgmg' => 'Informații despre acest fișier',
	'translate-taction-mstats-svgmg' => 'Statistici despre fișier',
	'translate-svg-table-header' => 'Identificator al mesajului',
	'translate-svg-filepage-edit' => 'modifică',
	'translate-svg-filepage-another' => 'altă limbă',
	'translate-svg-filepage-other' => 'alte limbi',
	'translate-svg-filepage-invite' => 'Acest fișier poate fi tradus cu ușurință în $1',
	'translate-svg-upload-none' => '(niciunul)',
	'translate-svg-chooselanguage-title' => 'Selectarea limbii',
	'translate-svg-new-label' => 'Limbă:',
	'translate-js-properties-legend' => 'Proprietăți',
	'translate-js-label-x' => 'Coordonate X:',
	'translate-js-label-y' => 'Coordonate Y:',
	'translate-js-label-color' => 'Culoare',
	'translate-js-label-font-family' => 'Font:',
	'translate-js-label-bold' => 'Aldin',
	'translate-js-label-italic' => 'Cursiv',
	'translate-js-label-underline' => 'Subliniere',
);

/** Russian (русский)
 * @author Express2000
 */
$messages['ru'] = array(
	'translatesvg-desc' => 'Предоставляет перевод файлов SVG в соответствии со спецификацией SVG1.1',
);

/** Rusyn (русиньскый)
 * @author Gazeb
 */
$messages['rue'] = array(
	'translate-svg-filepage-edit' => 'едітовати',
	'translate-svg-filepage-finish' => 'конець',
	'translate-svg-filepage-another' => 'іншый язык',
);

/** Sinhala (සිංහල)
 * @author පසිඳු කාවින්ද
 */
$messages['si'] = array(
	'translate-svg-thumbnail' => 'නියම ගොනුව',
	'translate-svg-filepage-edit' => 'සංස්කරණය',
	'translate-svg-filepage-finish' => 'අවසාන කරන්න',
	'translate-svg-filepage-another' => 'වෙනත් භාෂාව',
	'translate-svg-filepage-other' => 'වෙනත් භාෂාවන්',
	'translate-svg-upload-none' => '(කිසිවක් නැත)',
	'translate-svg-chooselanguage-title' => 'භාෂා තේරීම',
	'translate-svg-new-title' => 'SVG පරිවර්තනය',
	'translate-svg-new-label' => 'භාෂාව:',
	'translate-js-properties-legend' => 'ගුණ',
	'translate-js-label-x' => 'X-සමකක්ෂය:',
	'translate-js-label-y' => 'Y-සමකක්ෂය:',
	'translate-js-label-color' => 'වර්ණය:',
	'translate-js-label-font-family' => 'අක්ෂරය:',
	'translate-js-label-bold' => 'තද පැහැති',
	'translate-js-label-italic' => 'ඇළ අකුරු',
);

/** Swedish (svenska) */
$messages['sv'] = array(
	'translate-svg-nodesc' => '(Denna fil har inte en beskrivning.)',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 * @author Logicwiki
 */
$messages['ta'] = array(
	'translate-svg-thumbnail' => 'மூலக்கோப்பு',
	'translate-page-description-legend-svgmg' => 'இக் கோப்பு குறித்த தகவல்',
	'translate-taction-mstats-svgmg' => 'கோப்பின் புள்ளிவிவரம்',
	'translate-svg-filepage-edit' => 'தொகு',
	'translate-svg-filepage-finish' => 'நிறைவு செய்',
	'translate-svg-filepage-another' => 'மற்றொரு மொழி',
	'translate-svg-filepage-other' => 'பிற மொழிகள்',
	'translate-svg-chooselanguage-title' => 'மொழித் தெரிவு',
	'translate-svg-new-label' => 'மொழி:',
	'translate-js-properties-legend' => 'பண்புகள்',
	'translate-js-label-color' => 'வண்ணம்:',
	'translate-js-label-font-family' => 'எழுத்துரு:',
	'translate-js-label-bold' => 'தடித்த',
	'translate-js-label-italic' => 'சாய்ந்த',
	'translate-js-label-underline' => 'அடிக்கோடிட்ட',
);

/** Telugu (తెలుగు)
 * @author Veeven
 */
$messages['te'] = array(
	'translate-svg-thumbnail' => 'అసలు దస్త్రం',
	'translate-page-description-legend-svgmg' => 'ఈ దస్త్రం గురించిన సమాచారం',
	'translate-svg-filepage-another' => 'మరొక భాష',
	'translate-svg-filepage-other' => 'ఇతర భాషలు',
	'translate-svg-upload-none' => '(ఏమీలేవు)',
	'translate-svg-chooselanguage-title' => 'భాష ఎంపిక',
	'translate-svg-new-title' => 'SVG అనువాదం',
	'translate-svg-new-label' => 'భాష:',
	'translate-js-label-color' => 'రంగు:',
	'translate-js-label-bold' => 'బొద్దు',
	'translate-js-label-italic' => 'వాలు',
	'translate-js-label-underline' => 'క్రీగీత',
);

/** Tagalog (Tagalog)
 * @author AnakngAraw
 */
$messages['tl'] = array(
	'translatesvg-desc' => 'Nagbibigay ng isang ugnayang-mukha na nasa katutubong estilo para sa pagsasalinwika ng mga SVG na nakaalinsundo sa pagkakatukoy ng SVG1.1',
	'translate-taskui-export-as-svg' => 'Sagiping pabalik sa orihinal na talaksan ng SVG',
	'translate-svg-nodesc' => '(Walang ibinigay na paglalarawan ng talaksan.)',
	'translate-svg-thumbnail' => 'Orihinal na talaksan',
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
	'translate-svg-filepage-other' => 'iba pang mga wika',
	'translate-svg-filepage-item' => '$1 ($2)',
	'translate-svg-filepage-invite' => 'Ang talaksang ito ay maaaring maginhawang maisalinwika papunta sa $1',
	'translate-svg-autocreate' => 'Kusang lumilikha ng mga yunit ng salinwika na nakabatay sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-autodelete' => 'Kusang binubura ang hindi kailangang mga yunit ng salinwika na naaayon sa mga pagbabago sa pinagmulang talaksan ng SVG',
	'translate-svg-autoedit' => 'Kusang nagsasapanahon ng mga salinwika na nakabatay sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-autofuzzy' => 'Kusang minamarkahan ang mga salinwika bilang malabo na naaayon sa mga pagbabago sa pinagmulang talaksan na SVG',
	'translate-svg-upload-comment' => 'Isinasapanahon ang mga salinwika (sinimulan: $1; binago/pinalawig: $2)',
	'translate-svg-upload-none' => '(wala)',
	'translate-svg-chooselanguage-title' => 'Pilian ng wika',
	'translate-svg-chooselanguage-desc' => 'Paki piliin ang wikang nais mong pagsalinan ng wika ng talaksang SVG:',
	'translate-svg-instructions-title' => 'Una bang pagkakataon na isasalinwika ang isang talaksang SVG sa ganitong paraan?',
	'translate-svg-instructions-desc' => 'Upang makapagsimula na, pindutin ang isang pangkilala ng mensahe na nasa loob ng unang haligi ng talahanayan upang magsimula sa pagsasalinwika ng mensaheng iyan, na ginagamit ang mga pindutang "$1" at "$2" upang makatulong sa paglilibot sa mga mensaheng nangangailangan ng pagsasalinwika. Kapag tapos ka na, huwag kalimutang gamitin ang laylay na "$3" upang masagip ang iyong mga salinwika pabalik sa orihinal na talaksan.',
	'translate-svg-warn' => '<strong>Babala:</strong> Ang mga pagbabago mo sa talaksang SVG ay hindi magiging nakikita hanggang sa $1 mo, na dapat mong gawin sa tuwing matatapos ka sa pagsasalinwika ng talaksan.',
	'translate-svg-warn-inner' => 'sagipin ang mga pagbabago mo pabalik sa orihinal na talaksan',
	'translate-svg-new-title' => 'Salinwika ng SVG',
	'translate-svg-new-summary' => "Upang umpisahan ang pagsasalinwika ng talaksang ito, paki piliin ang wika na '''pinagmulan''' ng pagsasalinwika mo ng talaksang ito (kapag malabo, piliin ang pinaka malawak na sinasalitang wika).",
	'translate-svg-new-label' => 'Wika:',
	'translate-svg-new-error-import' => "'''Naganap ang isang kamalian''': Naganap ang isang hindi nakikilalang kamalian habang sinusubukang likhain ang mga pahinang kailangan para sa pagsasalinwika ng SVG na ito.",
	'translate-svg-new-error-group' => "'''Naganap ang isang kamalian''': Naganap ang isang hindi nakikilalang kamalian; marahil nakalimutan mong tukuyin ang isang pangkat na nasa loob ng URL?",
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

/** Simplified Chinese (‪中文（简体）‬)
 * @author Shirayuki
 */
$messages['zh-hans'] = array(
	'translate-svg-new-label' => '语言：',
);

/** Traditional Chinese (‪中文（繁體）‬)
 * @author Shirayuki
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'translate-svg-filepage-edit' => '編輯',
	'translate-svg-filepage-finish' => '完成',
	'translate-svg-filepage-another' => '其他語言',
	'translate-svg-filepage-other' => '其他語言',
	'translate-svg-upload-none' => '（無）',
	'translate-js-label-color' => '顏色：',
	'translate-js-label-bold' => '粗體',
	'translate-js-label-italic' => '斜體',
	'translate-js-label-underline' => '底線',
);

