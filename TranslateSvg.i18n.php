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
	'translate-svg-export-unsupported' => 'Exporting back to an SVG is not supported for this message group. If it is not obvious why this has occurred, you may wish to file a bug about this at $1.',
	'translate-svg-export-error' => 'An unexpected error occurred trying to save your changes back to the file. You may wish to file a bug about this at $1.',

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
 * @author F. Cosoleto
 * @author Jarry1250
 * @author Kghbln
 * @author Shirayuki
 * @author Siebrand
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
	'translate-svg-instructions-desc' => 'Content of a modal dialog box, offering advice to the user. $1, $2 and $3 all refer to the text of other interface messages, not linked.',
	'translate-svg-warn' => 'The content of a warning message. Parameters:
* $1 is a link, with the text of that link equal to the value of {{msg-mw|translate-svg-warn-inner}}.',
	'translate-svg-warn-inner' => 'The content of a link that forms part of another sentence (see {{msg-mw|translate-svg-warn}}.',
	'translate-svg-new-title' => 'Title of a special page',
	'translate-svg-new-summary' => 'Introductory paragraph on a special page. Attention is drawn to the fact that the user is asked to provide the original language the file is being translated FROM, rather than the language they are translating it INTO.',
	'translate-svg-new-label' => 'Label for a dropdown list of languages',
	'translate-svg-new-error-import' => 'Text for a paragraph that appears whenever a certain type of error occurs',
	'translate-svg-new-error-group' => 'Text for a paragraph that appears whenever a certain type of error occurs',
	'translate-svg-export-unsupported' => 'Text for a paragraph that appears whenever a certain type of error occurs. $1 is a link, with link text "bugzilla.wikimedia.org".',
	'translate-svg-export-error' => 'Text for a paragraph that appears whenever a certain type of error occurs. $1 is a link, with link text "bugzilla.wikimedia.org".',
	'translate-js-properties-legend' => 'The legend for a fieldset which contains property controls',
	'translate-js-label-x' => 'Label for textbox which sets the horizontal position of a string',
	'translate-js-label-y' => 'Label for a textbox which sets the vertical position of a string',
	'translate-js-label-color' => 'Label for a box which sets the (foreground) colour used for a string',
	'translate-js-label-font-family' => 'Label for a dropdown "combobox" which sets the typeface used in a string',
	'translate-js-label-font-size' => 'Label for a textbox which sets the size of the typeface used in a string',
	'translate-js-label-units' => 'Label for a dropdown "combobox" which sets the units for the font-size used in a string',
	'translate-js-label-bold' => 'Label for a checkbox governing the formatting of a string',
	'translate-js-label-italic' => 'Label for a checkbox governing the formatting of a string.
{{Identical|Italic}}',
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

/** Aramaic (ܐܪܡܝܐ)
 * @author Basharh
 */
$messages['arc'] = array(
	'translate-taction-mstats-svgmg' => 'ܚܒܝܫܘܬ ܡܢܝܢܐ ܕܠܦܦܐ',
);

/** Assamese (অসমীয়া)
 * @author Bishnu Saikia
 */
$messages['as'] = array(
	'translate-svg-filepage-edit' => 'সম্পাদনা',
	'translate-svg-filepage-finish' => 'সমাপ্ত',
	'translate-svg-filepage-another' => 'আন ভাষাত',
	'translate-svg-filepage-other' => 'আন ভাষাসমূহত',
	'translate-svg-upload-none' => '(একো নাই)',
);

/** Asturian (asturianu)
 * @author Xuacu
 */
$messages['ast'] = array(
	'translatesvg-desc' => "Ufre una interfaz d'estilu nativu pa traducir en llinia ficheros SVG cola especificación SVG1.1.",
);

/** Belarusian (Taraškievica orthography) (беларуская (тарашкевіца)‎)
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
	'translate-svg-warn' => '<strong>Увага!</strong> Для гэтай мовы ёсьць незахаваныя пераклады, і яны ня будуць адлюстраваныя, пакуль вы ці нехта не $1.',
	'translate-svg-warn-inner' => 'захавае тыя зьмены ў арыгінальны файл',
	'translate-svg-new-title' => 'Пераклад SVG',
	'translate-svg-new-summary' => "Каб пачаць пераклад гэтага файла, выберыце мову, '''зь якой''' вы будзеце перакладаць (калі ня ведаеце, выбіраце найбольш распаўсюджаную мову).",
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

/** Bulgarian (български)
 * @author පසිඳු කාවින්ද
 */
$messages['bg'] = array(
	'translate-svg-filepage-edit' => 'редактиране',
	'translate-svg-new-label' => 'Език:',
);

/** Bengali (বাংলা)
 * @author Bellayet
 */
$messages['bn'] = array(
	'translate-svg-thumbnail' => 'মূল ফাইল',
	'translate-taction-mstats-svgmg' => 'ফাইল পরিসংখ্যান',
	'translate-svg-filepage-edit' => 'সম্পাদনা',
	'translate-svg-filepage-finish' => 'সমাপ্ত',
	'translate-svg-filepage-another' => 'অন্য ভাষা',
	'translate-svg-filepage-other' => 'অন্য ভাষা',
	'translate-svg-upload-none' => '(কিছু নাই)',
	'translate-svg-chooselanguage-title' => 'ভাষা নির্বাচন',
	'translate-svg-new-title' => 'SVG অনুবাদ',
	'translate-js-label-bold' => 'গাঢ়',
	'translate-js-label-italic' => 'ইটালিক',
);

/** Sorani Kurdish (کوردی)
 * @author Calak
 */
$messages['ckb'] = array(
	'translate-svg-upload-none' => '(ھیچ)',
	'translate-js-label-color' => 'ڕەنگ:',
);

/** Czech (česky)
 * @author Vks
 */
$messages['cs'] = array(
	'translate-js-label-color' => 'Barva:',
	'translate-js-label-font-family' => 'Písmo:',
);

/** German (Deutsch)
 * @author Kghbln
 * @author Metalhead64
 */
$messages['de'] = array(
	'translatesvg-desc' => 'Ergänzt eine Spezialseite mit der SVG-Dateien in Einklang mit den SVG1.1-Spezifikationen übersetzt werden können',
	'translate-taskui-export-as-svg' => 'In der ursprünglichen SVG-Datei speichern',
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
	'translate-svg-instructions-desc' => 'Um mit der Übersetzung einer Nachricht zu beginnen, klicke auf eine Nachrichtenkennung in der ersten Spalte der Tabelle und verwende die Schaltflächen „$1“ und „$2“, um durch die Nachrichten zu navigieren, die eine Übersetzung benötigt. Sobald du fertig bist, vergiss bitte nicht, den Reiter „$3“ zu benutzen, um deine Übersetzungen in der Originaldatei zu speichern.',
	'translate-svg-warn' => '<strong>Warnung:</strong> Es gibt derzeit ungespeicherte Übersetzungen in dieser Sprache, die nicht sichtbar sein werden, bevor du oder jemand anderes $1.',
	'translate-svg-warn-inner' => 'diese Änderungen in der Originaldatei speichern',
	'translate-svg-new-title' => 'SVG-Übersetzung',
	'translate-svg-new-summary' => "Um mit der Übersetzung anfangen zu können, wähle zunächst die Sprache aus '''aus''' der du diese Datei übersetzt. Wähle die am meisten gesprochene Sprache, sofern keine Sprache eindeutig auswählbar ist.",
	'translate-svg-new-label' => 'Sprache:',
	'translate-svg-new-error-import' => "'''Es ist ein Fehler aufgetreten:''' Beim Erstellen der Seiten, die notwendig sind, um diese SVG-Datei übersetzen zu können, ist ein unbekannter Fehler aufgetreten.",
	'translate-svg-new-error-group' => "'''Es ist ein Fehler aufgetreten:''' Es ist ein unbekannter Fehler aufgetreten. Vielleicht hast du vergessen, in der URL eine Gruppe anzugeben?",
	'translate-svg-export-unsupported' => 'Das Exportieren zu einer SVG-Datei wird für diese Nachrichtengruppe nicht unterstützt. Falls nicht eindeutig bekannt ist, warum dies passierte, kannst du einen Fehler auf $1 berichten.',
	'translate-svg-export-error' => 'Beim Speichern deiner Änderungen an der Datei ist ein unerwarteter Fehler aufgetreten. Vielleicht möchtest du diesen Fehler auf $1 berichten.',
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

/** German (formal address) (Deutsch (Sie-Form)‎)
 * @author Kghbln
 */
$messages['de-formal'] = array(
	'translate-svg-filepage-caption-translator' => 'Dieses Bild als PNG in anderen Sprachen: $1; oder übersetzen Sie es in $2',
	'translate-svg-chooselanguage-desc' => 'Bitte wählen Sie die Sprache aus, in die Sie diese SVG-Datei übersetzen möchten:',
	'translate-svg-instructions-title' => 'Übersetzen Sie zum ersten Mal eine SVG-Datei auf diese Weise?',
	'translate-svg-instructions-desc' => 'Um mit der Übersetzung einer Nachricht zu beginnen, klicken Sie auf eine Nachrichtenkennung in der ersten Spalte der Tabelle und verwenden Sie die Schaltflächen „$1“ und „$2“, um durch die Nachrichten zu navigieren, die eine Übersetzung benötigen. Sobald Sie fertig sind, vergessen Sie bitte nicht, den Reiter „$3“ zu benutzen, um Ihre Übersetzungen in der Originaldatei zu speichern.',
	'translate-svg-warn' => '<strong>Warnung:</strong> Es gibt derzeit ungespeicherte Übersetzungen in dieser Sprache, die nicht sichtbar sein werden, bevor Sie oder jemand anderes $1.',
	'translate-svg-new-summary' => "Um mit der Übersetzung anfangen zu können, wählen Sie zunächst die Sprache aus '''aus''' der Sie diese Datei übersetzen. Wählen Sie die am meisten gesprochene Sprache, sofern keine Sprache eindeutig auswählbar ist.",
	'translate-svg-new-error-group' => "'''Es ist ein Fehler aufgetreten:''' Es ist ein unbekannter Fehler aufgetreten. Vielleicht haben Sie vergessen, in der URL eine Gruppe anzugeben?",
	'translate-svg-export-unsupported' => 'Das Exportieren zu einer SVG-Datei wird für diese Nachrichtengruppe nicht unterstützt. Falls nicht eindeutig bekannt ist, warum dies passierte, können Sie einen Fehler auf $1 berichten.',
	'translate-svg-export-error' => 'Beim Speichern Ihrer Änderungen an der Datei ist ein unerwarteter Fehler aufgetreten. Vielleicht möchten Sie diesen Fehler auf $1 berichten.',
);

/** Zazaki (Zazaki)
 * @author Erdemaslancan
 */
$messages['diq'] = array(
	'translate-svg-thumbnail' => 'Oricinal dosya',
	'translate-taction-mstats-svgmg' => 'İstatistikê dosya',
	'translate-svg-filepage-edit' => 'bıvurne',
	'translate-svg-filepage-finish' => 'qediya',
	'translate-svg-filepage-another' => 'Zıwanê bini',
	'translate-svg-filepage-other' => 'Zıwananê binan de',
	'translate-svg-upload-none' => '(çini yo)',
	'translate-svg-chooselanguage-title' => 'Zıwan weçinayış',
	'translate-svg-new-title' => 'SVG açarnayış',
	'translate-svg-new-label' => 'Zıwan:',
	'translate-js-properties-legend' => 'Xısusiyey',
	'translate-js-label-x' => 'X-koordinat:',
	'translate-js-label-y' => 'Y-koordinat:',
	'translate-js-label-color' => 'Dawte:',
	'translate-js-label-font-family' => 'Tipe:',
	'translate-js-label-bold' => 'Qalın',
	'translate-js-label-italic' => 'İtalik',
	'translate-js-label-underline' => 'Bınê cı xızine',
);

/** Lower Sorbian (dolnoserbski)
 * @author Michawiki
 */
$messages['dsb'] = array(
	'translatesvg-desc' => 'Stoj pówjerch za pśełožowanje SVG-datajow pó specifikaciji SVG1.1 k dispoziciji',
	'translate-taskui-export-as-svg' => 'Slědk do spócetneje SVG-dataje składowaś',
	'translate-svg-nodesc' => '(Žedne datajowe wopisanje pódane.)',
	'translate-svg-thumbnail' => 'Originalna dataja',
	'translate-svg-js-thumbnail' => '(Miniatura aktualizěrujo se awtomatiski)',
	'translate-page-description-legend-svgmg' => 'Informacije wó toś tej dataji',
	'translate-taction-mstats-svgmg' => 'Datajowa statistika',
	'translate-taction-export-svgmg' => 'Zaktualizěrowanu wersiju dataje nagraś',
	'translate-svg-table-header' => 'Identifikator powěsći',
	'translate-svg-filepage-caption' => 'Toś ten wobraz ako PNG w drugich rěcach: $1',
	'translate-svg-filepage-caption-translator' => 'Toś ten wobraz ako PNG w drugich rěcach: $1; abo pśełož jen do $2',
	'translate-svg-filepage-edit' => 'wobźěłaś',
	'translate-svg-filepage-finish' => 'skóńcyś',
	'translate-svg-filepage-another' => 'druga rěc',
	'translate-svg-filepage-other' => 'drugich rěcow',
	'translate-svg-filepage-invite' => 'Toś ta dataja dajo se lažko do $1 pśełožyś',
	'translate-svg-autocreate' => 'Pśełožowańske jadnotki na zakłaźe změnow na žrědłowej SVG-dataji se awtomatiski napóraju',
	'translate-svg-autodelete' => 'Njetrěbne pśełožowańske jadnotki na zakłaźe změnow na žrědłowej SVG-dataji se awtomatiski lašuju',
	'translate-svg-autoedit' => 'Pśełožki na zakłaźe změnow na žrědłowej SVG-dataji se awtomatiski nagrawaju',
	'translate-svg-autofuzzy' => 'Pśełožki na zakłaźe změnow na žrědłowej SVG-dataji marěkruju se awtomatiski ako zestarjone',
	'translate-svg-upload-comment' => 'Pśełožki se aktualizěruju (startowane: $1; změnjone/rozšyrjone: $2)',
	'translate-svg-upload-none' => '(žedna)',
	'translate-svg-chooselanguage-title' => 'Wuběrk rěcow',
	'translate-svg-chooselanguage-desc' => 'Pšosym wubjeŕ rěc, do kótarejež coš toś tu sVG-dataju pśełožiś:',
	'translate-svg-instructions-title' => 'Pśełožujoš SVG-dataju prědny raz na toś ten nałog?',
	'translate-svg-instructions-desc' => 'Aby pśełožowanje powěźeńki zachopił, klikni na identifikator powěźeńki w prědnem słupje tabele, z tym až wužywaš tłočaska "$1" a "$2", aby pśez te powěźeńki nawigěrował, kótarež muse se pśełožowaś. Gaž sy gótowy, pšosym njezabydni rejtark "$3" wužywaś, aby swóje pśełožki slědk do originalneje dataje składował.',
	'translate-svg-warn' => '<strong>Warnowanje:</strong> Su tuchylu njeskładowane pśełožki w toś tej rěcy, kótarež njebudu widobne, daniž $1.',
	'translate-svg-warn-inner' => 'njeskładuju toś te změny wót tebje abo někogo drugego slědk do originalneje dataje',
	'translate-svg-new-title' => 'SVG-pśełožk',
	'translate-svg-new-summary' => "Aby pśełožowanje zachopił, wubjeŕ pšosym rěc, '''z''' kótarejež pśełožujoš (jolic to jo njejasne, wubjeŕ nejwěcej powědanu rěc).",
	'translate-svg-new-label' => 'Rěc:',
	'translate-svg-new-error-import' => "'''Zmólka jo nastała:''' Njeznata zmólka jo nastała, gaž sy wopytał, boki napóraś, kótarež su trěbne za pśełožowanje toś togo SVG.",
	'translate-svg-new-error-group' => "'''Zmólka jo nastała:''' Njeznata zmólka jo nastała: snaź sy zabył, kupku w URL pódaś?",
	'translate-svg-export-unsupported' => 'Slědkeksportěrowanje do SVG-dataje njepodpěra se za toś tu powěsćowu kupku. Jolic njejo widobne, cogodla to jo nastało, móžoš na $1 zmólkowu powěźeńku wó tom  spisaś.',
	'translate-svg-export-error' => 'Njewótcakowana zmólka jo nastała, mjaztym až sy wopytał, swóje změny slědk do dataje składowaś. Snaź coš zmólkowu powěźeńku na $1 spisaś.',
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

/** Esperanto (Esperanto)
 * @author Blahma
 */
$messages['eo'] = array(
	'translatesvg-desc' => 'Provizas indiĝenan interfacon por tradukado de SVG-dosieroj konforme al la specifo SVG1.1',
	'translate-taskui-export-as-svg' => 'Rekonservi en la fontan SVG-dosieron',
	'translate-svg-nodesc' => '(Neniu dosiera priskribo estis provizita.)',
	'translate-svg-thumbnail' => 'Fonta dosiero',
	'translate-svg-js-thumbnail' => '(la antaŭvido ĝisdatiĝas aŭtomate)',
	'translate-page-description-legend-svgmg' => 'Informoj pri tiu ĉi dosiero',
	'translate-taction-mstats-svgmg' => 'Dosieraj statistikoj',
	'translate-taction-export-svgmg' => 'Alŝuti ĝisdatan version de la dosiero',
	'translate-svg-table-header' => 'Mesaĝa identigilo',
	'translate-svg-filepage-caption' => 'Tiu ĉi bildo bildigita kiel PNG en aliaj lingvoj: $1',
	'translate-svg-filepage-caption-translator' => 'Tiu ĉi bildo bildigita kiel PNG en aliaj lingvoj: $1; aŭ traduku ĝin al $2',
	'translate-svg-filepage-edit' => 'redakti',
	'translate-svg-filepage-finish' => 'fini',
	'translate-svg-filepage-another' => 'alia lingvo',
	'translate-svg-filepage-other' => 'aliaj lingvoj',
	'translate-svg-filepage-invite' => 'Tiu ĉi dosiero estas facile tradukebla al $1',
	'translate-svg-autocreate' => 'Aŭtomate kreanta tradukajn unuojn surbaze de ŝanĝoj en la fonta SVG-dosiero',
	'translate-svg-autodelete' => 'Aŭtomate foriganta nenecesajn tradukajn unuojn surbaze de ŝanĝoj en la fonta SVG-dosiero',
	'translate-svg-autoedit' => 'Aŭtomate ĝisdatiganta tradukojn surbaze de ŝanĝoj en la fonta SVG-dosiero',
	'translate-svg-autofuzzy' => 'Aŭtomate markanta tradukojn malprecizaj surbaze de ŝanĝoj en la fonta SVG-dosiero',
	'translate-svg-upload-comment' => 'Ĝisdatiganta tradukojn (komencis: $1; modifis/etendis: $2)',
	'translate-svg-upload-none' => '(neniu)',
	'translate-svg-chooselanguage-title' => 'Lingvoelekto',
	'translate-svg-chooselanguage-desc' => 'Bonvolu elekti la lingvon en kiun vi deziras traduki tiun ĉi SVG-dosieron:',
	'translate-svg-instructions-title' => 'Ĉu vi unuafoje ĉi tiel tradukas SVG-dosieron?',
	'translate-svg-instructions-desc' => 'Por komenci tradukadon de mesaĝo, klaku sur ĝian identigilon en la unua kolumno de la tabelo. Uzu la butonojn "$1" kaj "$2" por foliumi tra la tradukendaj mesaĝoj. Fininte ne forgesu uzi la panelon "$3" por rekonservi vian tradukaĵon en la fontan dosieron.',
	'translate-svg-warn' => '<strong>Averto:</strong> Ekzistas nekonservitaj tradukoj en tiuj ĉi lingvo kiuj ne estos videblaj ĝis vi aŭ aliuo $1.',
	'translate-svg-warn-inner' => 'rekonservas ilin en la fontan dosieron',
	'translate-svg-new-title' => 'SVG-tradukado',
	'translate-svg-new-summary' => "Por ektraduki tiun ĉi dosieron, bonvolu elekti la lingvon '''el''' kiu vi tradukas (do ne vian cellingvon).",
	'translate-svg-new-label' => 'Lingvo:',
	'translate-svg-new-error-import' => "'''Okazis eraro:''' Nekonata eraro okazis dum kreado de paĝoj necesaj por tradukado de tiu ĉi SVG.",
	'translate-svg-new-error-group' => "'''Okazis eraro:''' Nekonata eraro okazis; eble vi forgesis specifi grupon en la URL?",
	'translate-svg-export-unsupported' => 'Reelportado en SVG-n ne estas subtenata en tiu ĉi mesaĝgrupo. Se ne estas klare kial tiu ĉi eraro okazis, vi povas konsideri submeti cimraporton ĉe $1.',
	'translate-svg-export-error' => 'Neantaŭvidata eraro okazis dum rekonservado de viaj ŝanĝoj en dosieron. Vi povas konsideri submeti cimraporton ĉe $1.',
	'translate-js-properties-legend' => 'Atributoj',
	'translate-js-label-x' => 'Koordinato X:',
	'translate-js-label-y' => 'Koordinato Y:',
	'translate-js-label-color' => 'Koloro:',
	'translate-js-label-font-family' => 'Tiparo:',
	'translate-js-label-bold' => 'Grasa',
	'translate-js-label-italic' => 'Kursiva',
	'translate-js-label-underline' => 'Substrekita',
	'translate-js-font-family-inherit' => '(heredata)',
);

/** Spanish (español)
 * @author Armando-Martin
 * @author Dferg
 * @author Jewbask
 * @author Maor X
 */
$messages['es'] = array(
	'translatesvg-desc' => 'Proporciona una interfaz de estilo nativo para traducir archivos SVG en consonancia con la especificación SVG1.1',
	'translate-taskui-export-as-svg' => 'Guardar en el archivo SVG original',
	'translate-svg-nodesc' => '(No se ha suministrado ninguna descripción de archivo).',
	'translate-svg-thumbnail' => 'Archivo original',
	'translate-svg-js-thumbnail' => '(la miniatura se actualiza automáticamente)',
	'translate-page-description-legend-svgmg' => 'Información sobre este archivo',
	'translate-taction-mstats-svgmg' => 'Estadísticas de archivos',
	'translate-taction-export-svgmg' => 'Cargar la versión actualizada del archivo',
	'translate-svg-table-header' => 'Identificador del mensaje',
	'translate-svg-filepage-caption' => 'Esta imagen está representada como PNG en otros idiomas: $1',
	'translate-svg-filepage-caption-translator' => 'Esta imagen está representada como PNG en otros idiomas:  $1 ; o tradúcela en $2',
	'translate-svg-filepage-edit' => 'editar',
	'translate-svg-filepage-finish' => 'finalizar',
	'translate-svg-filepage-another' => 'otro idioma',
	'translate-svg-filepage-other' => 'otros idiomas',
	'translate-svg-filepage-invite' => 'Este archivo puede ser fácilmente traducido en $1',
	'translate-svg-autocreate' => 'Creación automática de las unidades de traducción basadas en los cambios en el archivo fuente SVG',
	'translate-svg-autodelete' => 'Eliminar automáticamente las unidades de traducción innecesarias basadas en los cambios en el archivo fuente SVG',
	'translate-svg-autoedit' => 'Actualización automática de las traducciones basadas en los cambios en el archivo fuente SVG',
	'translate-svg-autofuzzy' => 'Marcado automático de las traducciones como "fuzzy" basados en los cambios en el archivo fuente SVG',
	'translate-svg-upload-comment' => 'Actualización de traducciones (comenzadas: $1; modificadas/ampliadas: $2)',
	'translate-svg-upload-none' => '(ninguna)',
	'translate-svg-chooselanguage-title' => 'Selección de idioma',
	'translate-svg-chooselanguage-desc' => 'Selecciona el idioma al que quieres traducir este ficheiro SVG:',
	'translate-svg-instructions-title' => '¿Es la primera vez que traduces un archivo SVG de esta manera?',
	'translate-svg-instructions-desc' => 'Para empezar, haz clic en un identificador de mensaje en la primera columna de la tabla suministrada para comenzar la traducción de ese mensaje, utilizando los botones "$1" y "$2" para ayudar a navegar a través de los mensajes que requieren traducción. Cuando hayas terminado, recuerda usar la ficha "$3" para guardar tus traducciones en el archivo original.',
	'translate-svg-warn' => '<strong>Atención:</strong>Hay alguna tradución sin guardar en este idioma que no será visible hasta que tú o alguien $1.',
	'translate-svg-warn-inner' => 'guarda esos cambios en el archivo original',
	'translate-svg-new-title' => 'Traducción de archivos SVG',
	'translate-svg-new-summary' => "Para comenzar la traducción de este archivo, selecciona el idioma '''desde''' el que vas a realizar la traducción de este archivo (si existe ambigüedad, selecciona el idioma más hablado).",
	'translate-svg-new-label' => 'Idioma:',
	'translate-svg-new-error-import' => "'''Ha ocurrido un error:''' Se produjo un error desconocido mientras se intentaba crear las páginas necesarias para traducir este archivo SVG.",
	'translate-svg-new-error-group' => "'''Ha ocurrido un error:''' Se ha producido un error desconocido. Tal vez olvidaste especificar un grupo en la dirección URL.",
	'translate-svg-export-unsupported' => 'La exportación inversa a un archivo SVG no está soportada para este grupo de mensajes. Si no es obvio el motivo por el que ha ocurrido esto, tal vez quieras cumplimentar un formulario de error en la dirección $1.',
	'translate-svg-export-error' => 'Hubo un error inesperado al intentar guardar los cambios en el archivo. Puedes presentar un informe de error acerca de esto en $1.',
	'translate-js-properties-legend' => 'Propiedades',
	'translate-js-label-x' => 'Coordenada X:',
	'translate-js-label-y' => 'Coordenada Y:',
	'translate-js-label-color' => 'Color:',
	'translate-js-label-font-family' => 'Tipo de letra',
	'translate-js-label-bold' => 'Negrita',
	'translate-js-label-italic' => 'Cursiva',
	'translate-js-label-underline' => 'Subrayado',
	'translate-js-font-family-inherit' => '(heredar)',
);

/** Estonian (eesti)
 * @author Avjoska
 * @author Pikne
 */
$messages['et'] = array(
	'translate-svg-filepage-finish' => 'lõpeta',
	'translate-svg-filepage-another' => 'teine keel',
	'translate-svg-filepage-other' => 'muud keeled',
	'translate-js-label-x' => 'X-koordinaat:',
	'translate-js-label-y' => 'Y-koordinaat:',
	'translate-js-label-color' => 'Värvus:',
	'translate-js-label-bold' => 'Rasvane kiri',
	'translate-js-label-italic' => 'Kaldkiri',
	'translate-js-label-underline' => 'Allajoonitud kiri',
);

/** Basque (euskara)
 * @author පසිඳු කාවින්ද
 */
$messages['eu'] = array(
	'translate-svg-new-label' => 'Hizkuntza:',
	'translate-js-label-color' => 'Kolorea:',
	'translate-js-label-italic' => 'Etzana',
	'translate-js-label-underline' => 'Azpimarratu',
);

/** Persian (فارسی)
 * @author ZxxZxxZ
 * @author پاناروما
 */
$messages['fa'] = array(
	'translatesvg-desc' => 'رابطی بومی برای ترجمهٔ اس‌وی‌جی‌ها با مشخصات SVG1.1 فراهم می‌کند',
	'translate-svg-nodesc' => '(هیچ شرحی برای پرونده ارائه نشده‌است.)',
	'translate-svg-thumbnail' => 'پروندهٔ اصلی',
	'translate-page-description-legend-svgmg' => 'اطلاعات دربارهٔ این پرونده',
	'translate-svg-filepage-edit' => 'ویرایش',
	'translate-svg-filepage-finish' => 'اتمام',
	'translate-svg-filepage-another' => 'زبان‌های دیگر',
	'translate-svg-filepage-other' => 'زبان‌های دیگر',
	'translate-svg-upload-none' => '(هیچ)',
	'translate-svg-chooselanguage-title' => 'انتخاب زبان',
	'translate-svg-new-title' => 'ترجمهٔ اس‌وی‌جی',
	'translate-svg-new-label' => 'زبان:',
	'translate-js-properties-legend' => 'ویژگی‌ها',
	'translate-js-label-x' => 'مختصات X:',
	'translate-js-label-y' => 'مختصات Y:',
	'translate-js-label-color' => 'رنگ',
	'translate-js-label-font-family' => 'قلم:',
	'translate-js-label-bold' => 'پررنگ',
	'translate-js-label-italic' => 'مورب',
);

/** Finnish (suomi)
 * @author Beluga
 * @author Nedergard
 */
$messages['fi'] = array(
	'translate-taskui-export-as-svg' => 'Tallenna alkuperäiseen SVG-tiedostoon',
	'translate-svg-thumbnail' => 'Alkuperäinen tiedosto',
	'translate-page-description-legend-svgmg' => 'Tämän tiedoston tietoja',
	'translate-taction-mstats-svgmg' => 'Tiedoston tilastot',
	'translate-svg-filepage-edit' => 'muokkaa',
	'translate-svg-filepage-finish' => 'lopeta',
	'translate-svg-filepage-invite' => 'Tämän tiedoston voi kääntää helposti kielelle $1',
	'translate-svg-autocreate' => 'Luodaan automaattisesti käännösyksikköjä alkuperäiseen SVG-tiedostoon tehtyjen muutosten perusteella',
	'translate-svg-autodelete' => 'Poistetaan automaattisesti tarpeettomia käännösyksikköjä alkuperäiseen SVG-tiedostoon tehtyjen muutosten perusteella',
	'translate-svg-autoedit' => 'Päivitetään automaattisesti käännösyksikköjä alkuperäiseen SVG-tiedostoon tehtyjen muutosten perusteella',
	'translate-svg-chooselanguage-title' => 'Kielen valinta',
	'translate-svg-chooselanguage-desc' => 'Valitse kieli, jolle haluat kääntää tämän SVG-tiedoston',
	'translate-svg-instructions-title' => 'Käännätkö ensimmäistä kertaa SVG-tiedoston tällä tavalla?',
	'translate-svg-new-title' => 'SVG:n kääntäminen',
	'translate-svg-new-label' => 'Kieli',
	'translate-js-properties-legend' => 'Ominaisuudet',
	'translate-js-label-x' => 'X-koordinaatti',
	'translate-js-label-y' => 'Y-koordinaatti',
	'translate-js-label-color' => 'Väri:',
	'translate-js-label-font-family' => 'Kirjasin:',
	'translate-js-label-bold' => 'Lihavointi',
	'translate-js-label-italic' => 'Kursivointi',
	'translate-js-label-underline' => 'Alleviivaus',
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
	'translate-svg-filepage-caption' => "Cette image rendue comme PNG dans d'autres langues: $1",
	'translate-svg-filepage-caption-translator' => "Cette image rendue comme PNG dans d'autres langues: $1; ou la traduire en $2",
	'translate-svg-filepage-edit' => 'modifier',
	'translate-svg-filepage-finish' => 'terminer',
	'translate-svg-filepage-another' => 'Autres langues',
	'translate-svg-filepage-other' => 'autres langues',
	'translate-svg-filepage-invite' => 'Ce fichier peut facilement être traduit en $1',
	'translate-svg-autocreate' => 'Créer automatiquement des unités de traduction basées sur les changements sur le fichier source SVG',
	'translate-svg-autodelete' => 'Supprimer automatiquement les unités de traduction inutiles sur des changements du fichier source SVG',
	'translate-svg-autoedit' => 'Mise à jour automatique des traductions, basée sur les modifications du fichier source SVG',
	'translate-svg-autofuzzy' => "Marquer automatiquement les traductions comme non fiables lorsque des changements ont été effectués sur le fichier SVG d'origine",
	'translate-svg-upload-comment' => 'Mise à jour des traductions (traductions commencées : $1 ; traductions modifiées ou étendues : $2 )',
	'translate-svg-upload-none' => '(aucun)',
	'translate-svg-chooselanguage-title' => 'Sélection de la langue',
	'translate-svg-chooselanguage-desc' => 'Veuillez sélectionner la langue dans laquelle vous souhaitez traduire ce fichier SVG :',
	'translate-svg-instructions-title' => "C'est la première fois que vous traduisez un fichier SVG de cette manière?",
	'translate-svg-instructions-desc' => "Pour commencer, cliquez sur un identifiant de message dans la première colonne de la table afin de commencer la traduction de ce message, à l'aide des boutons « $1 « et » $2 » qui vous aideront à naviguer parmi les messages nécessitant une traduction. Lorsque vous avez terminé, n'oubliez pas d'utiliser l'onglet « $3 » pour enregistrer vos traductions dans le fichier d'origine.",
	'translate-svg-warn' => "<strong>Attention:</strong> Il y a des transactions non enregistrées en cours dans cette langue, qui ne seront pas visibles jusqu'à ce que vous ou quelqu'un d'autre $1.",
	'translate-svg-warn-inner' => "enregistrer vos modifications dans le fichier d'origine",
	'translate-svg-new-title' => 'Traduction SVG',
	'translate-svg-new-summary' => "Pour commencer la traduction de ce fichier, veuillez sélectionner la langue '''à partir de laquelle''' vous traduisez ce fichier (si vous n'êtes pas certain(e) de la langue à indiquer, sélectionnez la langue plus utilisée).",
	'translate-svg-new-label' => 'Langue :',
	'translate-svg-new-error-import' => "''' Une erreur s'est produite ''': Une erreur inconnue s'est produite lors de la tentative de création des pages nécessaires pour traduire ce SVG.",
	'translate-svg-new-error-group' => "''' Une erreur s'est produite ''': Une erreur inconnue s'est produite ; vous avez peut-être oublié de spécifier un groupe dans l'URL ?",
	'translate-svg-export-unsupported' => "Exporter vers un SVG n'est pas supporté pour ce groupe de messages. Si la raison n'en est pas claire, vous pouvez créer un bogue sur cela sur $1.",
	'translate-svg-export-error' => "Une erreur inattendue est survenue en essayant d'enregistrer vos changements dans le fichier. Vous pouvez signaler un bogue à ce propos sur $1.",
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

/** Franco-Provençal (arpetan)
 * @author ChrisPtDe
 */
$messages['frp'] = array(
	'translate-svg-thumbnail' => 'Fichiér d’origina',
	'translate-page-description-legend-svgmg' => 'Enformacions sur ceti fichiér',
	'translate-taction-mstats-svgmg' => 'Statistiques du fichiér',
	'translate-svg-table-header' => 'Numerô du mèssâjo',
	'translate-svg-filepage-edit' => 'changiér',
	'translate-svg-filepage-finish' => 'chavonar',
	'translate-svg-filepage-another' => 'n’ôtra lengoua',
	'translate-svg-filepage-other' => 'ôtres lengoues',
	'translate-svg-upload-none' => '(nion)',
	'translate-svg-chooselanguage-title' => 'Chouèx de la lengoua',
	'translate-svg-new-title' => 'Traduccion SVG',
	'translate-svg-new-label' => 'Lengoua :',
	'translate-js-properties-legend' => 'Propriètâts',
	'translate-js-label-x' => 'Coordonâ X :',
	'translate-js-label-y' => 'Coordonâ Y :',
	'translate-js-label-color' => 'Color :',
	'translate-js-label-font-family' => 'Police :',
	'translate-js-label-bold' => 'Grâs',
	'translate-js-label-italic' => 'Étalico',
	'translate-js-label-underline' => 'Solegnê',
	'translate-js-font-family-inherit' => '(héretâ)',
);

/** Irish (Gaeilge)
 * @author පසිඳු කාවින්ද
 */
$messages['ga'] = array(
	'translate-svg-filepage-edit' => 'cur in eagar',
	'translate-svg-new-label' => 'Teanga',
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
	'translate-svg-warn' => '<strong>Atención:</strong> Hai algunha tradución sen gardar nesta lingua que non será visible ata que alguén $1.',
	'translate-svg-warn-inner' => 'garde os cambios no ficheiro orixinal',
	'translate-svg-new-title' => 'Tradución de ficheiros SVG',
	'translate-svg-new-summary' => "Para comezar a tradución deste ficheiro, seleccione a lingua '''desde''' a que vai realizar a tradución (se non sabe, seleccione a lingua máis falada).",
	'translate-svg-new-label' => 'Lingua:',
	'translate-svg-new-error-import' => "'''Houbo un erro:''' Produciuse un erro descoñecido ao intentar crear as páxinas necesarias para a tradución deste ficheiro SVG.",
	'translate-svg-new-error-group' => "'''Houbo un erro:''' Produciuse un erro descoñecido. Se cadra esqueceu especificar un grupo no enderezo URL.",
	'translate-svg-export-unsupported' => 'A exportación de volta a un SVG non está soportada por este grupo de mensaxes. Se non resulta obvio o motivo polo que aconteceu isto, quizais queira encher un formulario de erro no enderezo $1.',
	'translate-svg-export-error' => 'Houbo un erro ao intentar gardar os cambios no ficheiro. Quizais queira encher un formulario de erro no enderezo $1.',
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
	'translate-svg-thumbnail' => 'הקובץ המקורי',
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
	'translate-svg-filepage-other' => 'שפות אחרות',
	'translate-svg-filepage-invite' => 'אפשר לתרגם את הקובץ הזה בקלות ל$1',
	'translate-svg-autocreate' => 'יצירה אוטומטית של יחידות תרגום בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autodelete' => 'מחיקה אוטומטית של יחידות תרגום לא נחוצות בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autoedit' => 'עדכון אוטומטי של תרגומים בהתאם לשינויים בקובץ ה־SVG המקורי',
	'translate-svg-autofuzzy' => 'טשטוש אוטומטי של תרגומים (FUZZY) בהתאם לקובץ ה־SVG המקורי',
	'translate-svg-upload-comment' => 'עדכון תרגומים (התחלה: $1; שינוי או הרחבה: $2)',
	'translate-svg-upload-none' => '(אין)',
	'translate-svg-chooselanguage-title' => 'בחירת שפה',
	'translate-svg-chooselanguage-desc' => 'נא לבחור את השפה שברצונך לתרגם את קובץ ה־SVG הזה אליה:',
	'translate-svg-instructions-title' => 'האם זה הניסיון הרישיון שלך לתרגם קובץ SVG בשיטה הזאת?',
	'translate-svg-instructions-desc' => 'כדי להתחיל, נא ללחוץ על מזהה ההודעה בעמודה הראשונה של הטבלה כדי להתחיל לתרגם את אותה ההודעה. באמצעות הכפתורים "$1" ו"$2" אפשר לנווט בהודעות שדורשות תרגום. כשנראה לך שסיימת, חשוב להשתמש בלשונית "$3" כדי לשמור את התרוגמים שלך חזרה לקובץ המקורי.',
	'translate-svg-warn' => '<strong>אזהרה:</strong> יש עכשיו שינויי שלא נשמרו בשפה הזאת, והם לא ייראו עד $1.',
	'translate-svg-warn-inner' => 'שמירת השינויים שלך חזרה לקובץ המקורי',
	'translate-svg-new-title' => 'תרגום SVG',
	'translate-svg-new-summary' => "כדי להתחיל לתרגם את הקובץ הזה, נא לבחור בשפה ש'''ממנה''' נעשה התרגום (אם לא ברור באיזו שפה לבחור, מומלץ לבחור בנפוצה ביותר).",
	'translate-svg-new-label' => 'שפה:',
	'translate-svg-new-error-import' => "'''אירעה שגיעה:''' שגיאה לא ידועה אירעה בעת ניסיון ליצור את הדפים הדרושים לתרגום ה־SVG הזה.",
	'translate-svg-new-error-group' => "'''אירעה שגיאה:''' אירעה שגיאה לא ידוע; אולי שכחת לציין קבוצה בכתובת?",
	'translate-svg-export-unsupported' => 'ייצוא חזרה ל־SVG לא נתמך בקבוצות ההודעות הזאת. אם לא ברור לך למה זה קרה, כדאי לפתוח באג באתר $1 .',
	'translate-svg-export-error' => 'אירעה שגיאה לא צפויה בעת ניסיון לשמור את השינויים שלך חזרה אל הקובץ. כדאי לפתוח באג באתר $1 .',
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
	'translate-svg-autocreate' => 'Přełožowanske jednotki na zakładźe změnow na žórłowej SVG-dataji so awtomatisce wutworjeja',
	'translate-svg-autodelete' => 'Njetrěbne přełožowanske jednotki na zakładźe změnow na žórłowej SVG-dataji so awtomatisce hašeja',
	'translate-svg-autoedit' => 'Přełožki na zakładźe změnow na žórłowej SVG-dataji so awtomatisce nahrawaja',
	'translate-svg-autofuzzy' => 'Přełožki na zakładźe změnow na žórłowej SVG-dataji so awtomatisce jako zestarjene markěruja',
	'translate-svg-upload-comment' => 'Přełožki so aktualizuja (startowane: $1; změnjene/rozšěrjene: $2)',
	'translate-svg-upload-none' => '(žana)',
	'translate-svg-chooselanguage-title' => 'Wuběr rěčow',
	'translate-svg-chooselanguage-desc' => 'Prošu wubjerće rěč, do kotrejež chceš SVG-dataju přełožić:',
	'translate-svg-instructions-title' => 'Přełožuješ SVG-dataju prěni raz na tute wašnje?',
	'translate-svg-instructions-desc' => 'Zo by přełožowanje zdźělenki započał, klikń na zdźělenski identifikator w prěnjej špalće tabele wužiwajo tłóčatce "$1" a "$2", zo by přez te zdźělenki nawigował, kotrež dyrbja so přełožować. Hdyž sy hotowy, prošu njezabudź rajtark "$3" wužiwać, zo by swoje přełožki wróćo do originalneje dataje składował.',
	'translate-svg-warn' => '<strong>Warnowanje:</strong> Su tuchwilu njeskładowane přełožki w tutej rěči, kotrež njebudu widźomne, doniž so $1.',
	'translate-svg-warn-inner' => 'tute změny wot tebje abo někoho druheho wróćo do originalneje dataje njeskładuja',
	'translate-svg-new-title' => 'SVG-přełožk',
	'translate-svg-new-summary' => "Zo by přełožowanje započał, wubjer prošu rěč, '''z''' kotrejež přełožuješ (jeli to je njejasne, wubjer najwjace rěčanu rěč).",
	'translate-svg-new-label' => 'Rěč:',
	'translate-svg-new-error-import' => "'''Zmylk je wustupił:''' Njeznaty zmylk je wustupił, hdyž sy spytał, strony wutworić, kotrež su trěbne za přełožowanje tutoho SVG.",
	'translate-svg-new-error-group' => "'''Zmylk je wustupił:''' Njeznaty zmylk je wustupił: snano sy zabył, skupinu w URL podać?",
	'translate-svg-export-unsupported' => 'Wróćoeksportowanje do SVG-dataje so za tutu powěsćowu skupinu njepodpěruje. Jeli njeje wočiwidne, čehodla to je wustupiło, móžeš na $1 zmylkowu zdźělenku wo tym  spisać',
	'translate-svg-export-error' => 'Njewočakowany zmylk je wustupił, mjeztym zo sy spytał, swoje změny wróćo do dataje składować. Snano chceš zmylkowu zdźělenku na $1 spisać.',
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
	'translate-svg-nodesc' => '(Ennek a fájlnak nincs leírása.)', # Fuzzy
);

/** Interlingua (interlingua)
 * @author McDutchie
 */
$messages['ia'] = array(
	'translatesvg-desc' => 'Forni un interfacie in stilo native pro traducer SVGs de maniera conforme al specification SVG1.1',
	'translate-svg-nodesc' => '(Iste file non ha un description.)', # Fuzzy
);

/** Indonesian (Bahasa Indonesia)
 * @author පසිඳු කාවින්ද
 */
$messages['id'] = array(
	'translate-svg-filepage-edit' => 'sunting',
	'translate-svg-new-label' => 'Bahasa:',
);

/** Italian (italiano)
 * @author Beta16
 * @author Darth Kule
 * @author F. Cosoleto
 */
$messages['it'] = array(
	'translatesvg-desc' => "Fornisce un'interfaccia nativa per tradurre SVG con le specifiche SVG1.1",
	'translate-svg-nodesc' => '(Non è stata fornita una descrizione del file).',
	'translate-svg-thumbnail' => 'File originale',
	'translate-svg-js-thumbnail' => '(la miniatura si aggiorna automaticamente)',
	'translate-page-description-legend-svgmg' => 'Informazioni su questo file',
	'translate-taction-mstats-svgmg' => 'Statistiche file',
	'translate-taction-export-svgmg' => 'Carica versione aggiornata del file',
	'translate-svg-table-header' => 'Identificatore messaggio',
	'translate-svg-filepage-caption' => 'Questa immagine è resa come PNG in altre lingue: $1',
	'translate-svg-filepage-caption-translator' => 'Questa immagine è resa come PNG in altre lingue: $1; o tradurla in $2',
	'translate-svg-filepage-edit' => 'modifica',
	'translate-svg-filepage-finish' => 'termina',
	'translate-svg-filepage-another' => "un'altra lingua",
	'translate-svg-filepage-other' => 'altre lingue',
	'translate-svg-filepage-invite' => 'Questo file può facilmente essere tradotto in $1',
	'translate-svg-autocreate' => 'Creazione automatica di unità di traduzione in base alle modifiche del file SVG di origine',
	'translate-svg-autodelete' => 'Cancellazione automatica di unità di traduzione non necessarie in base alle modifiche del file SVG di origine',
	'translate-svg-autoedit' => 'Aggiornamento automatico delle unità di traduzione in base alle modifiche del file SVG di origine',
	'translate-svg-autofuzzy' => 'Contrassegno automatico delle unità di traduzione come "fuzzy" in base alle modifiche del file SVG di origine',
	'translate-svg-upload-comment' => 'Aggiornamento traduzioni (iniziate: $1; modificate/ampliate: $2)',
	'translate-svg-upload-none' => '(nessuna)',
	'translate-svg-chooselanguage-title' => 'Selezione lingua',
	'translate-svg-chooselanguage-desc' => 'Selezionare la lingua in cui si desidera tradurre questo file SVG:',
	'translate-svg-instructions-title' => 'Prima volta che si traduce un file SVG in questo modo?',
	'translate-svg-instructions-desc' => 'Per iniziare, clicca su un identificatore di messaggio nella prima colonna della tabella per incominciare la traduzione del messaggio, utilizzando i bottoni "$1" e "$2" che consentono di navigare attraverso i messaggi che richiedono la traduzione. Quando hai finito, ricordati di utilizzare la scheda "$3" per salvare le traduzioni nel file originale.',
	'translate-svg-warn' => '<strong>Attenzione:</strong> attualmente sono presenti traduzioni non salvate in questa lingua, che non saranno visibili fino a quando tu o qualcun altro non $1.',
	'translate-svg-warn-inner' => 'salvate le modifiche nel file originale',
	'translate-svg-new-title' => 'Traduzione SVG',
	'translate-svg-new-summary' => 'Per iniziare la traduzione di questo file, selezionare la lingua da cui si vuole tradurre (in caso di ambiguità, preferire quella più usata).',
	'translate-svg-new-label' => 'Lingua:',
	'translate-svg-new-error-import' => "'''Si è verificato un errore:''' Errore sconosciuto provando a creare le pagine richieste per tradurre questo SVG.",
	'translate-svg-new-error-group' => "'''Si è verificato un errore:''' Errore sconosciuto, forse non è stato indicato un gruppo nell'URL?",
	'translate-svg-export-error' => 'Si verificato un errore cercando di salvare le modifiche apportate nel file. Puoi segnalare il problema su $1.',
	'translate-js-properties-legend' => 'Proprietà',
	'translate-js-label-x' => 'Coordinata x:',
	'translate-js-label-y' => 'Coordinata y:',
	'translate-js-label-color' => 'Colore:',
	'translate-js-label-font-family' => 'Tipo di carattere:',
	'translate-js-label-bold' => 'Grassetto',
	'translate-js-label-italic' => 'Corsivo',
	'translate-js-label-underline' => 'Sottolineato',
	'translate-js-font-family-inherit' => '(ereditato)',
);

/** Japanese (日本語)
 * @author Shirayuki
 */
$messages['ja'] = array(
	'translatesvg-desc' => 'SVG ファイルを翻訳するネイティブ スタイルのインターフェイス (SVG1.1 の仕様に準拠) を提供する',
	'translate-taskui-export-as-svg' => '元の SVG ファイルに上書き保存',
	'translate-svg-nodesc' => '(説明が入力されていません。)',
	'translate-svg-thumbnail' => '元のファイル',
	'translate-svg-js-thumbnail' => '(サムネイルは自動更新)',
	'translate-page-description-legend-svgmg' => 'このファイルについての情報',
	'translate-taction-mstats-svgmg' => 'ファイルの統計',
	'translate-taction-export-svgmg' => '変更後のファイルのアップロード',
	'translate-svg-table-header' => 'メッセージ識別子',
	'translate-svg-filepage-edit' => '編集',
	'translate-svg-filepage-finish' => '完了',
	'translate-svg-filepage-another' => '別の言語',
	'translate-svg-filepage-other' => '他の言語',
	'translate-svg-filepage-invite' => 'このファイルは$1に簡単に翻訳できます',
	'translate-svg-autocreate' => '元の SVG ファイルへの変更に基づいて翻訳単位を自動作成しています',
	'translate-svg-autodelete' => '元の SVG ファイルへの変更に基づいて不要な翻訳単位を自動削除しています',
	'translate-svg-autoedit' => '元の SVG ファイルへの変更に基づいて翻訳を自動更新しています',
	'translate-svg-autofuzzy' => '元の SVG ファイルへの変更に基づいて翻訳に「要査読」の印を付けています',
	'translate-svg-upload-comment' => '翻訳を更新 (開始: $1、変更/展開: $2)',
	'translate-svg-upload-none' => '(なし)',
	'translate-svg-chooselanguage-title' => '言語の選択',
	'translate-svg-chooselanguage-desc' => 'この SVG ファイルの翻訳先言語を選択してください:',
	'translate-svg-instructions-title' => 'この方法での SVG ファイルの翻訳は初めてですか?',
	'translate-svg-new-title' => 'SVGの翻訳',
	'translate-svg-new-label' => '言語:',
	'translate-svg-new-error-import' => "'''エラーが発生しました:''' この SVG ファイルの翻訳に必要なページを作成する際に不明なエラーが発生しました。",
	'translate-svg-new-error-group' => "'''エラーが発生しました:''' 不明なエラーが発生しました。URL 内でグループを指定し忘れた可能性があります。",
	'translate-svg-export-unsupported' => 'このメッセージ群では、元の SVG ファイルへの上書き保存に対応していません。このエラーが発生した理由が不明な場合は、$1でバグとして報告してください。',
	'translate-svg-export-error' => '編集をファイルに保存しようとした際に、予期しないエラーが発生しました。必要であれば $1 でバグを報告してください。',
	'translate-js-properties-legend' => 'プロパティ',
	'translate-js-label-x' => 'X 座標:',
	'translate-js-label-y' => 'Y 座標:',
	'translate-js-label-color' => '色:',
	'translate-js-label-font-family' => 'フォント:',
	'translate-js-label-bold' => '太字',
	'translate-js-label-italic' => '斜体',
	'translate-js-label-underline' => '下線',
	'translate-js-font-family-inherit' => '(継承)',
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
	'translate-svg-instructions-title' => '처음으로 SVG 파일을 이런 방법으로 번역하겠습니까?',
	'translate-svg-instructions-desc' => '시작하려면 번역이 필요한 메시지를 탐색할 수 있도록 "$1"과 "$2" 버튼을 사용하여 해당 메시지의 번역을 시작하기 위해 제공 테이블의 첫 번째 열에서 메시지 식별자를 클릭하세요. 완료하면 원본 파일로 다시 번역을 저장하려면 "$3" 탭을 사용해야 합니다.',
	'translate-svg-warn' => '<strong>경고:</strong> 당신이나 다른 $1 사용자가 번역할 때까지 공개하지 않는 이 언어에 저장하지 않은 번역이 있습니다.',
	'translate-svg-warn-inner' => '원본 파일에 바뀜을 다시 저장',
	'translate-svg-new-title' => 'SVG 번역',
	'translate-svg-new-summary' => "이 파일의 번역을 시작하려면 이 파일을 번역하는 '''출발''' 언어를 선택하세요. (모호한 경우 가장 널리 말하는 언어를 선택하세요)",
	'translate-svg-new-label' => '언어:',
	'translate-svg-new-error-import' => "'''오류가 발생했습니다:''' 이 SVG 번역에 필요한 문서를 만드는 동안 알 수없는 오류가 발생했습니다.",
	'translate-svg-new-error-group' => "'''오류가 발생했습니다:''' 알 수 없는 오류가 발생했습니다. 아마도 URL에서 그룹을 지정하는 잊었습니까?",
	'translate-svg-export-unsupported' => 'SVG로 내보내기가 이 메시지 그룹에 대해 지원하지 않습니다. 왜 발생했는지 분명하지 않을 경우 $1에 이에 대한 버그를 신고할 수 있습니다.',
	'translate-svg-export-error' => '바뀜을 파일에 저장하려고 할 때 예기치 않은 오류가 발생했습니다. $1에 이에 대한 버그를 신고할 수 있습니다.',
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

/** Colognian (Ripoarisch)
 * @author Purodha
 */
$messages['ksh'] = array(
	'translatesvg-desc' => 'Brängg en Schnettschtäll för <i lang="en">SVG</i>-Datteije ze övversäze, wi en dä Norrem SVG1.1 faßjelaat.',
	'translate-taskui-export-as-svg' => 'En de ojjenaal <i lang="en">SVG</i>-Dattei zeröckschriive',
	'translate-svg-nodesc' => '(Et sinn-er kein Aanjaabe övve di Dattei jemaat woode)',
	'translate-svg-thumbnail' => 'Ojinaal-Dattei',
	'translate-svg-js-thumbnail' => '(dat Minnibelsche weed automattesch aanjepaß)',
	'translate-page-description-legend-svgmg' => 'Aanjaabe övver heh di Dattei',
	'translate-taction-mstats-svgmg' => 'Schtatistike övver de Dattei',
	'translate-taction-export-svgmg' => 'Donn di veränderte Dattei huh laade',
	'translate-svg-table-header' => 'Kännzeische fö dä Täx udder di Nohreesch',
	'translate-svg-filepage-caption' => 'Heh dat Beld als <i lang="en">PNG</i> en ander Schprooche: $1',
	'translate-svg-filepage-caption-translator' => 'Heh dat Beld, ußjejovve als <i lang="en">PNG</i> en ander Schprooche: $1 - udder övversäds_et op $2.',
	'translate-svg-filepage-edit' => 'ändere',
	'translate-svg-filepage-finish' => 'ophüüre',
	'translate-svg-filepage-another' => 'en ander Schprooche',
	'translate-svg-filepage-other' => 'ander Schprooche',
	'translate-svg-filepage-invite' => 'Di Dattei heh kam_mer leisch op $1 övversäze.',
	'translate-svg-autocreate' => 'Neue Övversäzongsaffschnedde wääde automattesch aanjelaat, zopaß zoh dä Veränderonge aan dä Ojjenaal-<i lang="en">SVG</i>-Dattei.',
	'translate-svg-autodelete' => 'Onnüüdeje Övversäzongsaffschnedde wääde automattesch fottjeschmeße, zopaß zoh dä Veränderonge aan dä Ojjenaal-<i lang="en">SVG</i>-Dattei.',
	'translate-svg-autoedit' => 'Övversäzonge wääde automattesch aanjepß, wann se en dä Ojjenaal-<i lang="en">SVG</i>-Dattei verändert woodte.',
	'translate-svg-autofuzzy' => 'Övversäzonge wääde automattesch als ovverhollt makkeet, je noh dä Veränderonge en dä Ojjenaal-<i lang="en">SVG</i>-Dattei.',
	'translate-svg-upload-comment' => 'Övversäzonge op der neue Schtand aam bränge - $1 aanjefange - $2 aanjepaß.',
	'translate-svg-upload-none' => '(keine)',
	'translate-svg-chooselanguage-title' => 'Schprooche-Wahl',
	'translate-svg-chooselanguage-desc' => 'Bes esu jood un söhk di Schprooch uß, en di di <i lang="en">SVG</i>-Dattei övversaz wääde sull:',
	'translate-svg-instructions-title' => 'Es dat et eezde Mohl, dat De en <i lang="en">SVG</i>-Dattei esu övversäz?',
	'translate-svg-instructions-desc' => 'Öm loßzelääje, kleck mer op ene Kännzeischner en de eezde Kolonn en dä Tabäll un deiht di Nohreesch övversäze, di dann kütt. Met dä Knöpp „$1“ un „$2“ jeiht mer dorsch di Nohreeschte zom Övversäze. Aam Ängk kritt mer met däm Knopp „$3“ di Övversäzonge en de Ojjenaal-Dattei eren jeschrevve.',
	'translate-svg-warn' => '<strong>Opjepaß:</strong> Mer han em Momang onjesescherte Övversäzonge en dä Schprooch, di ävver eez seeschbaa wääde, wam_mer $1.',
	'translate-svg-warn-inner' => 'se en de Ojinaal_Dattei seschert',
	'translate-svg-new-title' => ' <i lang="en">SVG</i>-Övversäzong',
	'translate-svg-new-summary' => "Öm mem Övversäze aanzefange, donn et eez di Schprooch beschtemme, '''vun''' woh di Dattei övversäz wääde sull. Em Zweivel, nämm di miehzjebruchte Schprooch.",
	'translate-svg-new-label' => 'De Schprooch:',
	'translate-svg-new-error-import' => "'''Ene Fähler es opjetrodde,''' beim Versohch, di Sigge aanzelääje, di för et Övversäzze vun dä <i lang=\"en\">SVG</i>-Dattei nüüdesch sin.",
	'translate-svg-new-error-group' => "'''Ene Fähler es opjetrodde,''' wat jenou es nit kloh, velleisch had_Er verjäße, en Jropp em <i lang=\"en\">URL</i> aanzejävve?",
	'translate-svg-export-unsupported' => 'Övversäzonge en de <i lang="en">SVG</i>-Dattei zerökschriive künne mer för heh di Nohreeschtejropp nit. Wann nit kloh es, woröm dadd_esu es, künnts De en Fählermäldong maache op $1.',
	'translate-svg-export-error' => 'Ene onklohre Fähler es opjetrodde wi mer versöhk han, di Övversäzonge en de <i lang="en">SVG</i>-Dattei zerökzeschriive. Do künnds en Fählermäldong doh drövver maache op $1.',
	'translate-js-properties-legend' => 'Eijeschaffte',
	'translate-js-label-x' => "x-Ko'odenaate:",
	'translate-js-label-y' => "y-Ko'odenaate:",
	'translate-js-label-color' => 'Färv:',
	'translate-js-label-font-family' => 'Schreff-Zoot:',
	'translate-js-label-bold' => 'Fätte Schreff',
	'translate-js-label-italic' => 'Scheive Schreff',
	'translate-js-label-underline' => 'Ongerschtresche',
	'translate-js-font-family-inherit' => '(ärve)',
);

/** Luxembourgish (Lëtzebuergesch)
 * @author Robby
 */
$messages['lb'] = array(
	'translate-svg-nodesc' => '(Et gouf keng Beschreiwung vum Fichier uginn)',
	'translate-svg-thumbnail' => 'Original Fichier',
	'translate-svg-js-thumbnail' => '(Miniatur gëtt automatesch aktualiséiert)',
	'translate-page-description-legend-svgmg' => 'Informatiounen iwwer dëse Fichier',
	'translate-taction-mstats-svgmg' => 'Statistike vum Fichier',
	'translate-taction-export-svgmg' => 'Aktualiséiert Versioun vum Fichier eroplueden',
	'translate-svg-filepage-edit' => 'änneren',
	'translate-svg-filepage-finish' => 'fäerdeg maachen',
	'translate-svg-filepage-another' => 'eng aner Sprooch',
	'translate-svg-filepage-other' => 'aner Sproochen',
	'translate-svg-filepage-invite' => 'Dëse Fichier kann einfach op $1 iwwersat ginn',
	'translate-svg-upload-none' => '(keng)',
	'translate-svg-chooselanguage-title' => 'Eraussiche vun der Sprooch',
	'translate-svg-chooselanguage-desc' => "Sicht w.e.g. d'Sprooch eraus an déi Dir dësen SVG-Fichier iwwersetze wëllt:",
	'translate-svg-new-title' => 'SVG-Iwwersetzung',
	'translate-svg-new-label' => 'Sprooch:',
	'translate-js-properties-legend' => 'Eegeschaften',
	'translate-js-label-color' => 'Faarf:',
	'translate-js-label-italic' => 'Kursiv',
	'translate-js-label-underline' => 'Ënnerstrach',
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
	'translate-svg-warn' => '<strong>Предупредување:</strong> Имате незачувани преводи на овој јазик. Истите нема да бидат видливи додека не ги $1 (вие или некој друг).',
	'translate-svg-warn-inner' => 'зачувате промените врз изворната податотека',
	'translate-svg-new-title' => 'Превод на SVG',
	'translate-svg-new-summary' => "За да почнете со преведување на податотекава, најпрвин одберете '''од''' кој јазик ќе преведувате  (ако не е доволно јасно, одберете го најзастапениот јазик).",
	'translate-svg-new-label' => 'Јазик',
	'translate-svg-new-error-import' => "'''Се појави грешка''': Се појави непозната грешка при обидот да ги создадам страниците потребни за преведување на оваа SVG-податотека.",
	'translate-svg-new-error-group' => "'''Се појави грешка''': Се појави непозната грешка; да не заборавивте да укажете група во URL-адресата?",
	'translate-svg-export-unsupported' => 'Извезувањето повторно во SVG не е подджано за оваа група пораки. Доколку причината не е очигледна, ви предлагаме да ја пријавите на $1.',
	'translate-svg-export-error' => 'Се појави неочекувана грешка при обидот за зачувување на промените на податотеката. Ви предлагаме да ја пријавите на $1.',
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
	'translate-taskui-export-as-svg' => 'Simpan kembali kepada fail SVG asal',
	'translate-svg-nodesc' => '(Tiada keterangan fail.)',
	'translate-svg-thumbnail' => 'Fail asli',
	'translate-svg-js-thumbnail' => '(lakaran kenit mengemas kini secara automatik)',
	'translate-page-description-legend-svgmg' => 'Maklumat tentang fail ini',
	'translate-taction-mstats-svgmg' => 'Statistik fail',
	'translate-taction-export-svgmg' => 'Muat naik versi fail yang terkini',
	'translate-svg-table-header' => 'Pengenal pasti mesej',
	'translate-svg-filepage-caption' => 'Imej ini dipaparkan dalam bentuk PNG dalam bahasa-bahasa lain: $1',
	'translate-svg-filepage-caption-translator' => 'Imej ini dipaparkan dalam bentuk PNG dalam bahasa-bahasa lain: $1; atau terjemahkannya ke $2',
	'translate-svg-filepage-edit' => 'sunting',
	'translate-svg-filepage-finish' => 'siap',
	'translate-svg-filepage-another' => 'bahasa lain',
	'translate-svg-filepage-other' => 'bahasa-bahasa lain',
	'translate-svg-filepage-invite' => 'Fail ini mudah diterjemahkan ke $1',
	'translate-svg-autocreate' => 'Membuat unit terjemahan secara automatik berasaskan perubahan pada fail SVG sumber',
	'translate-svg-autodelete' => 'Menghapuskan unit terjemahan yang tidak perlu secara automatik berasaskan perubahan pada fail SVG sumber',
	'translate-svg-autoedit' => 'Mengemaskinikan unit terjemahan secara automatik berasaskan perubahan pada fail SVG sumber',
	'translate-svg-autofuzzy' => 'Menandakan unit terjemahan sebagai kabur secara automatik berasaskan perubahan pada fail SVG sumber',
	'translate-svg-upload-comment' => 'Mengemaskinikan terjemahan (dimulakan: $1; diubah suai/diperluas: $2)',
	'translate-svg-upload-none' => '(tiada)',
	'translate-svg-chooselanguage-title' => 'Pilihan bahasa',
	'translate-svg-chooselanguage-desc' => 'Sila pilih bahasa terjemahan pilihan anda untuk fail SVG ini:',
	'translate-svg-instructions-title' => 'Kali bertama menterjemahkan fail SVG sebegini?',
	'translate-svg-instructions-desc' => 'Sebagai permulaan, klik pada pengenal pasti mesej di lajur pertama jadual yang disediakan untuk memulakan penterjemahan mesej itu, dengan menggunakan punat-punat "$1" dan "$2" sebagai bantuan untuk menavigasi mesej-mese yang perlu diterjemah. Selepas selesai, jangan lupa untuk gunakan tab "$3" untuk menyimpan kembali terjemahan anda ke dalam fail yang asli.',
	'translate-svg-warn' => '<strong>Amaran:</strong> Kini terdapat terjemahan yang belum disimpan dalam bahasa ini, dan tidak akan diperlihatkan sehingga anda atau sesiapa sahaja $1.',
	'translate-svg-warn-inner' => 'menyimpan perubahan-perubahan itu kembali kepada fail yang asli',
	'translate-svg-new-title' => 'Penterjemahan SVG',
	'translate-svg-new-summary' => "Untuk mula menterjemah fail ini, sila pilih bahasa '''asal''' fail ini (jika berbilang bahasa, pilih bahasa yang paling ketara).",
	'translate-svg-new-label' => 'Bahasa:',
	'translate-svg-new-error-import' => "'''Ralat:''' Berlakunya ralat yang tidak dikenali sewaktu cuba membuat halaman-halaman yang perlu untuk menterjemahkan SVG ini.",
	'translate-svg-new-error-group' => "'''Ralat:''' Berlakunya ralat yang tidak dikenali; jangan-jangan anda terlupa untuk menyatakan kumpulannya di dalam URL?",
	'translate-svg-export-unsupported' => 'Mengeksport kembali ke dalam SVG tidak disokong untuk kumpulan mesej ini. Jika anda tidak jelas akan sebab-sebab terjadinya begini, anda disarankan supaya melaporkan kejadian pepijat di sini kepada $1.',
	'translate-svg-export-error' => 'Berlakunya ralat yang tidak dijangka ketika cuba menyimpan kembali suntingan anda kepada fail. Anda disarankan supaya melaporkan kejadian pepijat di sini kepada $1.',
	'translate-js-properties-legend' => 'Sifat',
	'translate-js-label-x' => 'Koordinat X:',
	'translate-js-label-y' => 'Koordinat Y:',
	'translate-js-label-color' => 'Warna:',
	'translate-js-label-font-family' => 'Rupa huruf:',
	'translate-js-label-bold' => 'Tebal',
	'translate-js-label-italic' => 'Condong',
	'translate-js-label-underline' => 'Bergaris Bawah',
	'translate-js-font-family-inherit' => '(azali)',
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
	'translate-svg-warn' => '<strong>Waarschuwing:</strong> Er zijn op het moment nog niet opgeslagen wijzigingen in deze taal die niet zichtbaar zijn totdat u of iemand anders $1.',
	'translate-svg-warn-inner' => 'uw wijzigingen opslaat in het oorspronkelijke bestand',
	'translate-svg-new-title' => 'SVG-vertaling',
	'translate-svg-new-summary' => "Selecteer de taal '''waaruit''' u dit bestand wilt vertalen om te beginnen met het vertalen van dit bestand. Als dit dubbelzinnig is, selecteer dan de meest gesproken taal.",
	'translate-svg-new-label' => 'Taal:',
	'translate-svg-new-error-import' => "'''Er is een fout opgetreden:''' er is een onbekende fout opgetreden tijdens het aanmaken van de pagina's die nodig zijn voor het vertalen van dit SVG-bestand.",
	'translate-svg-new-error-group' => "'''Er is een fout opgetreden:''' er is een onbekende fout opgetreden. Wellicht bent u vergeten een groep aan te geven in de URL?",
	'translate-svg-export-unsupported' => 'Terug naar SVG exporteren wordt niet ondersteund voor deze berichtengroep. Als het niet duidelijk is waarom u dit bericht te zien hebt gekregen, overweeg dan een probleem te melden in $1.',
	'translate-svg-export-error' => 'Er is een onverwachte fout opgetreden tijdens het opslaan van uw wijzigingen in het bestand. Overweeg een probleem te melden in $1.',
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

/** Norwegian Nynorsk (norsk (nynorsk)‎)
 * @author Njardarlogar
 */
$messages['nn'] = array(
	'translate-svg-nodesc' => '(inga filskildring vart oppgjeven)',
	'translate-svg-thumbnail' => 'Opphavleg fil',
	'translate-svg-js-thumbnail' => '(miniatyrbiletet oppdaterer seg av seg sjølv)',
	'translate-page-description-legend-svgmg' => 'Informasjon om fila',
	'translate-taction-mstats-svgmg' => 'Filstatistikk',
	'translate-taction-export-svgmg' => 'Lasta opp oppdatert versjon av fila',
	'translate-svg-filepage-edit' => 'endra',
	'translate-svg-filepage-finish' => 'fullfør',
	'translate-svg-filepage-another' => 'anna språk',
	'translate-svg-filepage-other' => 'andre språk',
	'translate-svg-filepage-invite' => 'Fila kan lett setjast om til $1',
	'translate-svg-upload-none' => '(ingen)',
	'translate-svg-chooselanguage-title' => 'Språkval',
	'translate-svg-chooselanguage-desc' => 'Vel språket du vil setja om SVG-fila til:',
	'translate-svg-instructions-title' => 'Fyrste gongen du set om ein SVG-fil på denne måten?',
	'translate-svg-warn' => '<strong>Åtvaring:</strong> Det er omsetjingar på dette språket som ikkje er lagra og som ikkje vert synlege før du eller ein annan $1.',
	'translate-svg-warn-inner' => 'lagrar endringane i den opphavlege fila',
	'translate-svg-new-title' => 'SVG-omsetjing',
	'translate-svg-new-label' => 'Språk:',
	'translate-js-properties-legend' => 'Eigenskapar',
	'translate-js-label-x' => 'X-koordinat:',
	'translate-js-label-y' => 'Y-koordinat:',
	'translate-js-label-color' => 'Farge:',
	'translate-js-label-font-family' => 'Skrifttype:',
	'translate-js-label-bold' => 'Feit',
	'translate-js-label-italic' => 'Kursiv',
	'translate-js-font-family-inherit' => '(arva)',
);

/** Pälzisch (Pälzisch)
 * @author Manuae
 */
$messages['pfl'] = array(
	'translatesvg-desc' => 'Hodä nadirlischi Schniddschdell fas Iwasedze vun SVG-Dadaije im Oinglong midde Oagab SVG1.1',
);

/** Polish (polski)
 * @author BeginaFelicysym
 */
$messages['pl'] = array(
	'translate-svg-thumbnail' => 'Oryginalny plik',
	'translate-page-description-legend-svgmg' => 'Informacje na temat tego pliku',
	'translate-taction-mstats-svgmg' => 'Statystyki pliku',
	'translate-taction-export-svgmg' => 'Prześlij zaktualizowaną wersję pliku',
	'translate-svg-table-header' => 'Identyfikator wiadomości',
	'translate-svg-filepage-another' => 'inny język',
	'translate-svg-filepage-other' => 'inne języki',
	'translate-svg-chooselanguage-title' => 'Wybór języka',
	'translate-svg-warn-inner' => 'zapisuje te zmiany z powrotem w oryginalnym pliku',
	'translate-svg-new-label' => 'Język:',
	'translate-js-label-x' => 'Współrzędna X:',
	'translate-js-label-y' => 'Współrzędna Y:',
	'translate-js-label-color' => 'Kolor:',
	'translate-js-label-font-family' => 'Czcionka:',
	'translate-js-label-bold' => 'Pogrubienie',
	'translate-js-label-italic' => 'Kursywa',
	'translate-js-label-underline' => 'Podkreślenie',
);

/** Piedmontese (Piemontèis)
 * @author Dragonòt
 */
$messages['pms'] = array(
	'translatesvg-desc' => "A dà n'antërfacia an stil nativ për volté SVG an linia con la specificassion SVG1.1",
	'translate-taskui-export-as-svg' => "Salva andré dzora l'archivi original SVG",
	'translate-svg-nodesc' => "(Gnun-a descrission d'archivi a l'é stàit dàit.)",
	'translate-svg-thumbnail' => 'Archivi original',
	'translate-svg-js-thumbnail' => "(la miniadura a s'agiorna automaticament)",
	'translate-page-description-legend-svgmg' => 'Anformassion a propòsit dë sto archivi',
	'translate-taction-mstats-svgmg' => "Statìstiche d'archivi",
	'translate-taction-export-svgmg' => "Caria na vërsion agiornà dl'archivi",
	'translate-svg-table-header' => 'Identificador dël mëssagi',
	'translate-svg-filepage-caption' => "Sta figura a l'é rëndùa com PNG an àutre lenghe: $1",
	'translate-svg-filepage-caption-translator' => "Sta figura a l'é rëndùa com PNG an àutre lenghe: $1; o vòltla an $2",
	'translate-svg-filepage-edit' => 'modìfica',
	'translate-svg-filepage-finish' => 'finiss',
	'translate-svg-filepage-another' => 'Àutra lenga',
	'translate-svg-filepage-other' => 'àutre lenghe',
	'translate-svg-filepage-invite' => "St'archivi a peul esse voltà facilment an $1",
	'translate-svg-autocreate' => "Creé automaticament unità ëd tradussion dzora cambi a l'archivi sorziss SVG",
	'translate-svg-autodelete' => "Scanselé automaticament unità ëd tradussion pa necessarie basà su cambi a l'archivi sorziss SVG",
	'translate-svg-autoedit' => "Agiorné automaticament dle tradussion basà su cambi a l'archivi sorziss SVG",
	'translate-svg-autofuzzy' => 'Marché automaticament dle tradussion com "fuzzy" basà su cambi a l\'archivi sorziss SVG',
	'translate-svg-upload-comment' => 'Modifiché tradussion (ancaminà: $1; modificà/espandù: $2)',
	'translate-svg-upload-none' => '(gnun)',
	'translate-svg-chooselanguage-title' => 'Selession ëd lenga',
	'translate-svg-chooselanguage-desc' => "Për piasì selession-a la lenga anté it veule volté st'archivi SVG:",
	'translate-svg-instructions-title' => "Prima vira ch'it traduve n'archivi SVG an sta manera?",
	'translate-svg-instructions-desc' => 'Për ancaminé, sgnaca dzora n\'identificador ëd mëssagi ant la prima colòna dla tàula dàita për ancaminé la tradussion dël mëssagi, dovrand ij boton "$1" e "$2" për giuté a navighé travers ai mëssagi ch\'a ciamo tradussion. Quand it l\'has fàit, arcòrdte ëd dovré la scheda "$3" për salvé toe tradussion andré ant l\'archivi original.',
	'translate-svg-warn' => '<strong>Avis:</strong> A-i son al moment dle tradussion pa salvà an costa lenga, che a saran pa visible fin che ti o quaidun àutr $1.',
	'translate-svg-warn-inner' => "a salva sti cambi andré ant l'archivi original",
	'translate-svg-new-title' => 'Tradussion SVG',
	'translate-svg-new-summary' => "Për ancaminé la tradussion dë st'archivi, për piasì selession-a la lenga anté it të stas voltand sto archivi '''da''' (se pa ciàir, selession-a la lenga pi largament parlà).",
	'translate-svg-new-label' => 'Lenghe',
	'translate-svg-new-error-import' => "'''A l'é capitaje n'eror:''' N'eror pa conossù a l'é capità an mente it provave a creé le pagine ciamà për volté sto SVG.",
	'translate-svg-new-error-group' => "'''A l'é capitaje n'eror:''' A l'é capitaje n'eror pa conossù; miraco it l'has-to dësmentià dë specifiché na partìa ant l'anliura?",
	'translate-svg-export-unsupported' => "Esporté andré a un SVG a l'é pa apogià për sta partìa ëd mëssagi. S'a l'é pa ciàir përché sòn a l'é capità, it peule signalé n'eror a propòsit ëd sòn a $1.",
	'translate-svg-export-error' => "N'eror pa spetà a l'é capità provand a salvé it tò cambi andré dzora l'archivi. It peule signalé n'eror a propòsit ëd sòn a $1.",
	'translate-js-properties-legend' => 'Proprietà',
	'translate-js-label-x' => 'X-coordinà:',
	'translate-js-label-y' => 'Y-coordinà:',
	'translate-js-label-color' => 'Color:',
	'translate-js-label-font-family' => 'Font (caràter):',
	'translate-js-label-bold' => 'Grassèt',
	'translate-js-label-italic' => 'Corsiv',
	'translate-js-label-underline' => 'Sotlineà',
	'translate-js-font-family-inherit' => '(ardità)',
);

/** Pashto (پښتو)
 * @author Ahmed-Najib-Biabani-Ibrahimkhel
 */
$messages['ps'] = array(
	'translate-svg-thumbnail' => 'آرنۍ دوتنه',
	'translate-page-description-legend-svgmg' => 'د دې دوتنې په اړه مالومات',
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

/** Brazilian Portuguese (português do Brasil)
 * @author Luckas Blade
 */
$messages['pt-br'] = array(
	'translate-svg-filepage-edit' => 'editar',
	'translate-svg-filepage-finish' => 'finalizar',
	'translate-svg-filepage-another' => 'outra língua',
	'translate-svg-filepage-other' => 'outras línguas',
	'translate-js-properties-legend' => 'Propriedades',
	'translate-js-label-x' => 'Coordenada X:',
	'translate-js-label-y' => 'Coordenada Y:',
	'translate-js-label-color' => 'Cor:',
	'translate-js-label-font-family' => 'Fonte:',
	'translate-js-label-bold' => 'Negrito',
	'translate-js-label-italic' => 'Itálico',
	'translate-js-label-underline' => 'Sublinhado',
	'translate-js-font-family-inherit' => '(herdar)',
);

/** Romanian (română)
 * @author Minisarm
 * @author Stelistcristi
 */
$messages['ro'] = array(
	'translate-svg-thumbnail' => 'Fișier original',
	'translate-page-description-legend-svgmg' => 'Informații despre acest fișier',
	'translate-taction-mstats-svgmg' => 'Statistici despre fișier',
	'translate-svg-table-header' => 'Identificator al mesajului',
	'translate-svg-filepage-edit' => 'modificare',
	'translate-svg-filepage-another' => 'altă limbă',
	'translate-svg-filepage-other' => 'alte limbi',
	'translate-svg-filepage-invite' => 'Acest fișier poate fi tradus cu ușurință în $1',
	'translate-svg-upload-none' => '(niciunul)',
	'translate-svg-chooselanguage-title' => 'Selectare limbă',
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
 * @author Kalan
 */
$messages['ru'] = array(
	'translatesvg-desc' => 'Предоставляет перевод файлов SVG в соответствии со спецификацией SVG1.1',
	'translate-taskui-export-as-svg' => 'Сохранить в оригинальный SVG-файл',
	'translate-svg-nodesc' => '(Описание файла не было предоставлено.)',
	'translate-svg-thumbnail' => 'Оригинальный файл',
	'translate-svg-js-thumbnail' => '(эскиз обновляется автоматически)',
	'translate-page-description-legend-svgmg' => 'Информация об этом файле',
	'translate-taction-mstats-svgmg' => 'Статистика по файлу',
	'translate-taction-export-svgmg' => 'Загрузить обновлённую версию файла',
	'translate-svg-table-header' => 'Идентификатор сообщения',
	'translate-svg-filepage-caption' => 'Это изображение, отрисованное в PNG, на других языках: $1',
	'translate-svg-filepage-caption-translator' => 'Это изображение, отрисованное в PNG, на других языках: $1; перевести его на $2',
	'translate-svg-filepage-edit' => 'править',
	'translate-svg-filepage-finish' => 'закончить',
	'translate-svg-filepage-another' => 'другой язык',
	'translate-svg-filepage-other' => 'другие языки',
	'translate-svg-filepage-invite' => 'Этот файл можно легко перевести на $1',
	'translate-svg-autocreate' => 'Автоматическое создание элементов перевода на основе изменений в исходном SVG-файле',
	'translate-svg-autodelete' => 'Автоматическое удаление ненужных элементов перевода на основе изменений в исходном SVG-файле',
	'translate-svg-autoedit' => 'Автоматическое обновление перевода на основе изменений в исходном SVG-файле',
	'translate-svg-autofuzzy' => 'Автоматическая пометка переводов как нуждающихся в пересмотре на основе изменений в исходном SVG-файле',
	'translate-svg-upload-comment' => 'Обновление переводов (начаты: $1; изменены/расширены: $2)',
	'translate-svg-upload-none' => '(нет)',
	'translate-svg-chooselanguage-title' => 'Выбор языка',
	'translate-svg-chooselanguage-desc' => 'Выберите язык, на который вы хотите перевести этот SVG-файл:',
	'translate-svg-instructions-title' => 'Вы впервые пользуетесь этим способом перевода SVG-файлов?',
	'translate-svg-instructions-desc' => 'Чтобы начать, нажмите на идентификатор сообщения в первой колонке таблицы, чтобы начать перевод этого сообщения, используя кнопки «$1» и «$2» для перемещения между сообщениями, нуждающимися в переводе. Когда закончите, не забудьте воспользоваться вкладкой «$3» для сохранения ваших изменений в оригинальном файле.',
	'translate-svg-warn' => '<strong>Внимание:</strong> Есть несохранённые переводы на этом языке, которые не будут видны, пока вы или кто-нибудь ещё не $1.',
	'translate-svg-warn-inner' => 'сохраните эти изменения в оригинальный файл',
	'translate-svg-new-title' => 'Перевод SVG',
	'translate-svg-new-summary' => "Чтобы начать перевод этого файла, выберите язык, '''с которого''' вы переводите его (в случае сомнений выберите наиболее распространённый язык).",
	'translate-svg-new-label' => 'Язык:',
	'translate-svg-new-error-import' => "'''Ошибка:''' Произошла неизвестная ошибка при попытке создать страницы, необходимые для перевода этого SVG-файла.",
	'translate-svg-new-error-group' => "'''Ошибка:''' Произошла неизвестная ошибка; может, вы забыли добавить группу в URL?",
	'translate-js-properties-legend' => 'Свойства',
	'translate-js-label-x' => 'Координата X:',
	'translate-js-label-y' => 'Координата Y:',
	'translate-js-label-color' => 'Цвет:',
	'translate-js-label-font-family' => 'Шрифт:',
	'translate-js-label-bold' => 'Жирный',
	'translate-js-label-italic' => 'Курсив',
	'translate-js-label-underline' => 'Подчёркнутый',
	'translate-js-font-family-inherit' => '(по умолчанию)',
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
	'translate-taskui-export-as-svg' => 'නියම SVG ගොනුව වෙත නැවත සුරකින්න',
	'translate-svg-nodesc' => '(ගොනු විස්තරයක් ඉදිරිපත් කොට නොමැත.)',
	'translate-svg-thumbnail' => 'නියම ගොනුව',
	'translate-svg-js-thumbnail' => '(සංක්ෂිප්ත නිරූපකය ස්වයංක්‍රීයව යාවත්කාලීන වේ)',
	'translate-page-description-legend-svgmg' => 'මෙම ගොනුව පිළිබඳ තොරතුරු',
	'translate-taction-mstats-svgmg' => 'ගොනු සංඛ්‍යාන දත්ත',
	'translate-taction-export-svgmg' => 'ගොනුවේ යාවත්කාලීන කෙරූ අනුවාදයක් උඩුගත කරන්න',
	'translate-svg-table-header' => 'පණිවුඩ හඳුන්වනය',
	'translate-svg-filepage-edit' => 'සංස්කරණය',
	'translate-svg-filepage-finish' => 'අවසාන කරන්න',
	'translate-svg-filepage-another' => 'වෙනත් භාෂාව',
	'translate-svg-filepage-other' => 'වෙනත් භාෂාවන්',
	'translate-svg-filepage-invite' => 'මෙම ගොනුව පහසුවෙන් $1 වෙත පරිවර්තනය කල හැක',
	'translate-svg-upload-none' => '(කිසිවක් නැත)',
	'translate-svg-chooselanguage-title' => 'භාෂා තේරීම',
	'translate-svg-instructions-title' => 'මේ විදිහට SVG ගොනුවක් පරිවර්තනය කරන්නේ පලවෙනි වතාවටද?',
	'translate-svg-warn-inner' => 'එම වෙනස්කම් නැවතත් නියම ගොනුවට සුරකින්න',
	'translate-svg-new-title' => 'SVG පරිවර්තනය',
	'translate-svg-new-label' => 'භාෂාව:',
	'translate-js-properties-legend' => 'ගුණ',
	'translate-js-label-x' => 'X-සමකක්ෂය:',
	'translate-js-label-y' => 'Y-සමකක්ෂය:',
	'translate-js-label-color' => 'වර්ණය:',
	'translate-js-label-font-family' => 'අක්ෂරය:',
	'translate-js-label-bold' => 'තද පැහැති',
	'translate-js-label-italic' => 'ඇළ අකුරු',
	'translate-js-label-underline' => 'යට ඉරි ගසන්න',
	'translate-js-font-family-inherit' => '(උරුමවීම)',
);

/** Swedish (svenska)
 * @author Ainali
 */
$messages['sv'] = array(
	'translatesvg-desc' => 'Innehåller en gränssnitt för att översätta SVGs enligt SVG1.1 specifikation',
	'translate-taskui-export-as-svg' => 'Spara tillbaka till ursprungliga SVG-filen',
	'translate-svg-nodesc' => '(Ingen filbeskrivning har angetts.)',
	'translate-svg-thumbnail' => 'Originalfilen',
	'translate-svg-js-thumbnail' => '(miniatyr uppdateras automatiskt)',
	'translate-page-description-legend-svgmg' => 'Information om den här filen',
	'translate-taction-mstats-svgmg' => 'Filstatistik',
	'translate-taction-export-svgmg' => 'Ladda upp uppdaterad version av filen',
	'translate-svg-table-header' => 'Meddelandeidentifierare',
	'translate-svg-filepage-caption' => 'Bilden återges som PNG på andra språk: $1',
	'translate-svg-filepage-caption-translator' => 'Bilden återges som PNG på andra språk:  $1 , eller översätta det till $2',
	'translate-svg-filepage-edit' => 'redigera',
	'translate-svg-filepage-finish' => 'slutför',
	'translate-svg-filepage-another' => 'ett annat språk',
	'translate-svg-filepage-other' => 'andra språk',
	'translate-svg-filepage-invite' => 'Denna fil kan enkelt översättas till $1',
	'translate-svg-autocreate' => 'Skapa automatiskt översättningsenheter baserade på ändringar i SVG-källfilen',
	'translate-svg-autodelete' => 'Automatisk borttagning av onödiga översättningsenheter baserade på ändringar i SVG-källfilen',
	'translate-svg-autoedit' => 'Automatisk uppdatering av översättningar baserat på ändringar i SVG-källfilen',
	'translate-svg-autofuzzy' => 'Automatisk märkning av översättningar som otydliga baserat på ändringar i SVG-källfilen',
	'translate-svg-upload-comment' => 'Uppdatering av översättningar (startade:  $1 , modifierade/utökade:  $2)',
	'translate-svg-upload-none' => '(ingen)',
	'translate-svg-chooselanguage-title' => 'Språkval',
	'translate-svg-chooselanguage-desc' => 'Välj det språk du vill du översätta SVG filen till:',
	'translate-svg-instructions-title' => 'Är det första gången du översätter en SVG-fil på detta sätt?',
	'translate-svg-instructions-desc' => 'För att sätta igång, klicka på ett meddelande-ID i första kolumnen i tabellen som börjar översättning av meddelandet. Använd "$1" och "$2" knapparna för att navigera genom de meddelanden som kräver översättning. När du är klar, kom ihåg att använda "$3"-fliken för att spara dina översättningar tillbaka till den ursprungliga filen.',
	'translate-svg-warn' => '<strong>Varning:</strong> Det finns för närvarande osparade översättningar på detta språk som inte syns förrän du eller någon annan  $1.',
	'translate-svg-warn-inner' => 'sparar ändringarna tillbaka till den ursprungliga filen',
	'translate-svg-new-title' => 'SVG-översättning',
	'translate-svg-new-summary' => "Om du vill börja översättning av denna fil, välj det språk du översätter den här filen ''' från ''' (om tvetydigt, välj det mest talade språket).",
	'translate-svg-new-label' => 'Språk:',
	'translate-svg-new-error-import' => "'''Ett fel uppstod:''' Ett okänt fel inträffade under tiden som det försöktes skapa sidorna som krävs för att översätta denna SVG.",
	'translate-svg-new-error-group' => "'''Ett fel uppstod:''' Ett okänt fel inträffade; du har kanske glömt att ange en grupp i URL-adressen?",
	'translate-svg-export-unsupported' => 'Exportera tillbaka till en SVG stöds inte för denna meddelandegrupp. Om det inte är uppenbart varför detta skett, kanske du vill rapportera ett fel om detta vid  $1.',
	'translate-svg-export-error' => 'Ett oväntat fel inträffade vid försök att spara ändringarna tillbaka till filen. Du kan rapportera ett fel om detta vid  $1.',
	'translate-js-properties-legend' => 'Egenskaper',
	'translate-js-label-x' => 'X-koordinat:',
	'translate-js-label-y' => 'Y-koordinat:',
	'translate-js-label-color' => 'Färg:',
	'translate-js-label-font-family' => 'Typsnitt:',
	'translate-js-label-bold' => 'Fet',
	'translate-js-label-italic' => 'Kursiv',
	'translate-js-label-underline' => 'Understrykning',
	'translate-js-font-family-inherit' => '(ärv)',
);

/** Tamil (தமிழ்)
 * @author Karthi.dr
 * @author Logicwiki
 * @author மதனாஹரன்
 */
$messages['ta'] = array(
	'translate-svg-thumbnail' => 'மூலக்கோப்பு',
	'translate-page-description-legend-svgmg' => 'இக் கோப்பு குறித்த தகவல்',
	'translate-taction-mstats-svgmg' => 'கோப்பின் புள்ளிவிவரம்',
	'translate-svg-filepage-edit' => 'தொகு',
	'translate-svg-filepage-finish' => 'நிறைவு செய்',
	'translate-svg-filepage-another' => 'மற்றொரு மொழி',
	'translate-svg-filepage-other' => 'பிற மொழிகள்',
	'translate-svg-upload-none' => '(ஏதுமில்லை)',
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
	'translate-svg-warn' => '<strong>Babala:</strong> Kasalukuyang mayroong hindi pa nasasagip na mga salinwika na nasa wikang ito, na hindi magiging nakikita hanggang sa $1 mo o ng ibang tao.',
	'translate-svg-warn-inner' => 'sagipin ang mga pagbabago mo pabalik sa orihinal na talaksan',
	'translate-svg-new-title' => 'Salinwika ng SVG',
	'translate-svg-new-summary' => "Upang umpisahan ang pagsasalinwika ng talaksang ito, paki piliin ang wika na '''pinagmulan''' ng pagsasalinwika mo ng talaksang ito (kapag malabo, piliin ang pinaka malawak na sinasalitang wika).",
	'translate-svg-new-label' => 'Wika:',
	'translate-svg-new-error-import' => "'''Naganap ang isang kamalian''': Naganap ang isang hindi nakikilalang kamalian habang sinusubukang likhain ang mga pahinang kailangan para sa pagsasalinwika ng SVG na ito.",
	'translate-svg-new-error-group' => "'''Naganap ang isang kamalian''': Naganap ang isang hindi nakikilalang kamalian; marahil nakalimutan mong tukuyin ang isang pangkat na nasa loob ng URL?",
	'translate-svg-export-unsupported' => 'Hindi sinusuportahan para sa pangkat na ito ng mensahe ang pagluluwas na pabalik papunta sa isang SVG. Kung hindi halata kung bakit ito naganap, maaaring naisin mong magharap ng isang surot patungkol dito roon sa $1.',
	'translate-svg-export-error' => 'Isang hindi inaasahang kamalian ang nagapanap noong sinusubukang sagipin ang mga pagbabago mo na pabalik sa talaksan. Maaaring naisin mong magharap ng isang surot patungkol dito roon sa $1.',
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
 * @author Base
 * @author Olvin
 */
$messages['uk'] = array(
	'translatesvg-desc' => 'Забезпечує звичний інтерфейс для перекладу файлів .SVG у відповідності до специфікації SVG1.1',
	'translate-taskui-export-as-svg' => 'Зберегти вихідний файл SVG',
	'translate-svg-nodesc' => '(Опис файлу не було надано.)',
	'translate-svg-thumbnail' => 'Вихідний файл',
	'translate-svg-js-thumbnail' => '(мініатюра оновлюється автоматично)',
	'translate-page-description-legend-svgmg' => 'Інформація про цей файл',
	'translate-taction-mstats-svgmg' => 'Статистика файлу',
	'translate-taction-export-svgmg' => 'Завантажити оновлену версію цього файлу',
	'translate-svg-table-header' => 'Ідентифікатор повідомлення',
	'translate-svg-filepage-caption' => 'Це зображення у PNG на інших мовах: $1',
	'translate-svg-filepage-caption-translator' => 'Це зображення у PNG іншими мовами: $1; або перекласти його на $2',
	'translate-svg-filepage-edit' => 'ред.',
	'translate-svg-filepage-finish' => 'завершити',
	'translate-svg-filepage-another' => 'іншу мову',
	'translate-svg-filepage-other' => 'інші мови',
	'translate-svg-filepage-invite' => 'Цей файл може бути легко перекладений на $1',
	'translate-svg-autocreate' => 'Автоматичне створення елементів перекладу на основі змін у вихідному SVG-файлі',
	'translate-svg-autodelete' => 'Автоматичне вилучення непотрібних елементів перекладу на основі змін у вихідному SVG-файлі',
	'translate-svg-autoedit' => 'Автоматичне оновлення елементів перекладу на основі змін у вихідному SVG-файлі',
	'translate-svg-autofuzzy' => 'Автоматична помітка перекладів як таких, що потребують перегляду на основі змін у вихідному SVG-файлі',
	'translate-svg-upload-comment' => 'Оновлення перекладів (розпочато: $1; змінено/розширено: $2)',
	'translate-svg-upload-none' => '(немає)',
	'translate-svg-chooselanguage-title' => 'Вибір мови',
	'translate-svg-chooselanguage-desc' => 'Будь ласка, оберіть мову на яку Ви бажаєте перекласти цей SVG файл:',
	'translate-svg-instructions-title' => 'Ви вперше перекладаєте SVG-файл цим способом?',
	'translate-svg-instructions-desc' => 'Щоб розпочати, натисніть на ідентифікаторі повідомлення у першій колонці таблиці передбаченої для початку перекладу повідомлення, використовуючи кнопки «$1» та «$2», для спрощення навігації через повідомлення, що потребують перекладу. Коли Ви завершите, не забудьте скористатись вкладкою «$3» для збереження Вашого перекладу у вихідному файлі.',
	'translate-svg-warn' => '<strong>Увага:</strong> Є незбережені переклади цією мовою, які не буде видно, поки Ви чи хто-небудь ще не $1.',
	'translate-svg-warn-inner' => 'збережете ці зміни у вихідному файлі',
	'translate-svg-new-title' => 'Переклад SVG',
	'translate-svg-new-summary' => "Щоб розпочати переклад цього файлу, будь ласка, оберіть мову '''з якої''' Ви його перекладаєте (у разі сумнівів оберіть найбільш поширену мову)",
	'translate-svg-new-label' => 'Мова:',
	'translate-svg-new-error-import' => "'''Сталася помилка:''' Сталась невідома помилка при спробі створити сторінки, що необхідні для перекладу цього SVG-файлу.",
	'translate-svg-new-error-group' => "'''Сталася помилка:''' Сталась невідома помилка; можливо Ви забули додати групу до URL?",
	'translate-svg-export-unsupported' => 'Експорт назад, у SVG не підтримується для цієї групи повідомлень. Якщо не очевидно чому це сталось, можливо Ви хочете повідомити що це баґ на $1.',
	'translate-svg-export-error' => 'Неочікувана помилка при спробі зберегти Ваші зміни назад до файлу. Можливо, Ви хочете повідомити що це баґ на $1.',
	'translate-js-properties-legend' => 'Всластивості',
	'translate-js-label-x' => 'Координата X:',
	'translate-js-label-y' => 'Координата Y:',
	'translate-js-label-color' => 'Колір:',
	'translate-js-label-font-family' => 'Шрифт:',
	'translate-js-label-bold' => 'Жирний',
	'translate-js-label-italic' => 'Курсив',
	'translate-js-label-underline' => 'Підкреслений',
	'translate-js-font-family-inherit' => '(успадкування)',
);

/** Urdu (اردو)
 * @author පසිඳු කාවින්ද
 */
$messages['ur'] = array(
	'translate-svg-thumbnail' => 'اصل فائل',
	'translate-taction-mstats-svgmg' => 'فائل کے اعداد و شمار',
	'translate-svg-filepage-edit' => 'ترمیم کریں',
	'translate-svg-filepage-finish' => 'ختم',
	'translate-svg-filepage-another' => 'کوئی دوسری زبان',
	'translate-svg-filepage-other' => 'دیگر زبانیں',
	'translate-svg-upload-none' => 'کوئی بھی (نہیں)',
	'translate-svg-chooselanguage-title' => 'زبان کا انتخاب',
	'translate-svg-new-label' => 'زبان:',
	'translate-js-properties-legend' => 'کی خصوصیات',
	'translate-js-label-color' => 'رنگ:',
	'translate-js-label-font-family' => 'فونٹ:',
	'translate-js-label-bold' => 'بولڈ',
);

/** Vietnamese (Tiếng Việt)
 * @author Minh Nguyen
 * @author පසිඳු කාවින්ද
 */
$messages['vi'] = array(
	'translatesvg-desc' => 'Cung cấp giao diện giống dạng thuần để biên dịch các tập tin SVG theo tiêu chuẩn SVG 1.1',
	'translate-taskui-export-as-svg' => 'Lưu vào tập tin SVG gốc',
	'translate-svg-nodesc' => '(Không cung cấp lời miêu tả tập tin.)',
	'translate-svg-thumbnail' => 'Tập tin gốc',
	'translate-svg-js-thumbnail' => '(hình nhỏ sẽ được cập nhật tự động)',
	'translate-page-description-legend-svgmg' => 'Thông tin về tập tin này',
	'translate-taction-mstats-svgmg' => 'Thống kê tập tin',
	'translate-taction-export-svgmg' => 'Tải lên tập tin cập nhật',
	'translate-svg-table-header' => 'Định danh thông điệp',
	'translate-svg-filepage-caption' => 'Hình này được kết xuất dưới dạng PNG trong ngôn ngữ khác: $1',
	'translate-svg-filepage-caption-translator' => 'Hình này được kết xuất dưới dạng PNG trong ngôn ngữ khác: $1; hoặc dịch nó ra $2',
	'translate-svg-filepage-edit' => 'sửa',
	'translate-svg-filepage-finish' => 'Kết thúc',
	'translate-svg-filepage-another' => 'ngôn ngữ khác',
	'translate-svg-filepage-other' => 'các ngôn ngữ khác',
	'translate-svg-filepage-invite' => 'Có thể dịch tập tin này ra $1 một cách dễ dàng',
	'translate-svg-upload-none' => '(không có)',
	'translate-svg-chooselanguage-title' => 'Lựa chọn ngôn ngữ',
	'translate-svg-warn' => '<strong>Cảnh báo:</strong> Hiện có bản dịch chưa lưu trong ngôn ngữ này. Để hiển thị các bản dịch này, bạn hoặc người khác phải $1.',
	'translate-svg-warn-inner' => 'lưu các thay đổi vào tập tin gốc',
	'translate-svg-new-title' => 'Biên dịch SVG',
	'translate-svg-new-label' => 'Ngôn ngữ:',
	'translate-js-properties-legend' => 'Thuộc tính',
	'translate-js-label-x' => 'Hoành độ:',
	'translate-js-label-y' => 'Tung độ:',
	'translate-js-label-color' => 'Màu:',
	'translate-js-label-font-family' => 'Phông chữ:',
	'translate-js-label-bold' => 'Đậm',
	'translate-js-label-italic' => 'In xiên',
	'translate-js-label-underline' => 'Gạch dưới',
);

/** Yiddish (ייִדיש)
 * @author פוילישער
 */
$messages['yi'] = array(
	'translate-svg-nodesc' => '(די טעקע האט נישט קיין באשרייבונג.)',
	'translate-svg-thumbnail' => 'ארגינעלע טעקע',
	'translate-svg-js-thumbnail' => '(קליינבילד ווערט דערהיינטיקט אויטאמאטיש)',
	'translate-page-description-legend-svgmg' => 'אינפֿארמאציע וועגן דער טעקע',
	'translate-taction-mstats-svgmg' => 'טעקע סטאטיסטיק',
	'translate-taction-export-svgmg' => 'ארויפלאדן דערהיינטיקטע ווערסיע פון טעקע',
	'translate-svg-table-header' => 'מעלדונג אידענטיפיצירער',
	'translate-svg-filepage-caption' => 'דאס בילד געוויזן ווי PNG אין אנדערע שפראכן: $1',
	'translate-svg-filepage-caption-translator' => 'דאס בילד געוויזן ווי PNG אין אנדערע שפראכן: $1; אדער זעצט איבער אויף $2',
	'translate-svg-filepage-edit' => 'רעדאַקטירן',
	'translate-svg-filepage-finish' => 'קאנטשן',
	'translate-svg-filepage-another' => 'אנדער שפראך',
	'translate-svg-filepage-other' => 'אנדערע שפראַכן',
	'translate-svg-filepage-invite' => 'די טעקע קען מען גרינג איבערזעצן אין $1',
	'translate-svg-upload-none' => '(קיין)',
	'translate-svg-chooselanguage-title' => 'שפראך אויסקלייב',
	'translate-svg-chooselanguage-desc' => 'ביטע קלויבט די שפראך אין וואס איר ווילט איבערזעצן די SVG טעקע:',
	'translate-svg-new-title' => 'SVG איבערזעצונג',
	'translate-svg-new-label' => 'שפּראַך:',
	'translate-js-label-color' => 'קאליר:',
	'translate-js-label-font-family' => 'פֿאנט:',
	'translate-js-label-bold' => 'דיק',
	'translate-js-label-italic' => 'קורסיוו',
	'translate-js-label-underline' => 'אונטערשטרײַכן',
	'translate-js-font-family-inherit' => '(יַרשענען)',
);

/** Simplified Chinese (中文（简体）‎)
 * @author Shirayuki
 */
$messages['zh-hans'] = array(
	'translate-svg-thumbnail' => '原始文件',
	'translate-taction-mstats-svgmg' => '文件统计',
	'translate-svg-filepage-edit' => '编辑',
	'translate-svg-filepage-finish' => '完成',
	'translate-svg-filepage-another' => '其他语言',
	'translate-svg-filepage-other' => '其他语言',
	'translate-svg-filepage-item' => '$1（$2）',
	'translate-svg-upload-none' => '（无）',
	'translate-svg-chooselanguage-title' => '语言选择',
	'translate-svg-new-title' => 'SVG翻译',
	'translate-svg-new-label' => '语言：',
	'translate-js-properties-legend' => '属性',
	'translate-js-label-x' => 'X坐标：',
	'translate-js-label-y' => 'Y坐标：',
	'translate-js-label-color' => '颜色：',
	'translate-js-label-font-family' => '字体：',
	'translate-js-label-bold' => '粗体',
	'translate-js-label-italic' => '斜体',
	'translate-js-label-underline' => '底线',
	'translate-js-font-family-inherit' => '（继承）',
);

/** Traditional Chinese (中文（繁體）‎)
 * @author Shirayuki
 * @author Simon Shek
 */
$messages['zh-hant'] = array(
	'translate-svg-thumbnail' => '原本文件',
	'translate-taction-mstats-svgmg' => '文件統計',
	'translate-svg-filepage-edit' => '編輯',
	'translate-svg-filepage-finish' => '完成',
	'translate-svg-filepage-another' => '其他語言',
	'translate-svg-filepage-other' => '其他語言',
	'translate-svg-upload-none' => '（無）',
	'translate-svg-chooselanguage-title' => '語言選擇',
	'translate-svg-new-title' => 'SVG翻譯',
	'translate-svg-new-label' => '語言：',
	'translate-js-properties-legend' => '屬性',
	'translate-js-label-x' => 'X坐標：',
	'translate-js-label-y' => 'Y坐標：',
	'translate-js-label-color' => '顏色：',
	'translate-js-label-font-family' => '字型：',
	'translate-js-label-bold' => '粗體',
	'translate-js-label-italic' => '斜體',
	'translate-js-label-underline' => '底線',
	'translate-js-font-family-inherit' => '（繼承）',
);
