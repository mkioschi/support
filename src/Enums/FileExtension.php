<?php

namespace Mkioschi\Support\Enums;

use Throwable;

enum FileExtension: string implements EnumContract
{
    case DOT_3G2 = '.3g2';
    case DOT_3GP = '.3gp';
    case DOT_7Z = '.7z';
    case DOT_AVI = '.avi';
    case DOT_CSV = '.csv';
    case DOT_DOC = '.doc';
    case DOT_DOCX = '.docx';
    case DOT_GIF = '.gif';
    case DOT_ICO = '.ico';
    case DOT_JPEG = '.jpeg';
    case DOT_JPG = '.jpg';
    case DOT_JSON = '.json';
    case DOT_MP3 = '.mp3';
    case DOT_MP4 = '.mp4';
    case DOT_MPEG = '.mpeg';
    case DOT_ODP = '.odp';
    case DOT_ODS = '.ods';
    case DOT_ODT = '.odt';
    case DOT_OGA = '.oga';
    case DOT_OGV = '.ogv';
    case DOT_OPUS = '.opus';
    case DOT_PDF = '.pdf';
    case DOT_PNG = '.png';
    case DOT_PPT = '.ppt';
    case DOT_PPTX = '.pptx';
    case DOT_RAR = '.rar';
    case DOT_RTF = '.rtf';
    case DOT_SVG = '.svg';
    case DOT_TAR = '.tar';
    case DOT_TIF = '.tif';
    case DOT_TIFF = '.tiff';
    case DOT_TXT = '.txt';
    case DOT_WAV = '.wav';
    case DOT_WEBA = '.weba';
    case DOT_WEBM = '.webm';
    case DOT_WEBP = '.webp';
    case DOT_XLS = '.xls';
    case DOT_XLSX = '.xlsx';
    case DOT_XML = '.xml';
    case DOT_ZIP = '.zip';

    public static function values(): array
    {
        return array_column(
            array: self::cases(),
            column_key: 'value'
        );
    }

    public static function innFrom(mixed $value): ?self
    {
        if (is_null($value)) return null;
        return self::from($value);
    }

    public function label(): string
    {
        return $this->value;
    }

    public static function labels(): array
    {
        $labels = [];

        foreach (self::values() as $value) {
            $labels[$value] = $value;
        }

        return $labels;
    }

    /**
     * @return string[]
     */
    public function mimeTypes(): array
    {
        return match ($this) {
            self::DOT_3G2 => ['audio/3gpp2', 'video/3gpp2'],
            self::DOT_3GP => ['audio/3gpp', 'video/3gpp'],
            self::DOT_7Z => ['application/x-7z-compressed'],
            self::DOT_AVI => ['video/x-msvideo'],
            self::DOT_CSV => ['text/csv'],
            self::DOT_DOC => ['application/msword'],
            self::DOT_DOCX => ['application/vnd.openxmlformats-officedocument.wordprocessingml.document'],
            self::DOT_GIF => ['image/gif'],
            self::DOT_ICO => ['image/vnd.microsoft.icon'],
            self::DOT_JPEG, self::DOT_JPG => ['image/jpeg'],
            self::DOT_JSON => ['application/json'],
            self::DOT_MP3 => ['audio/mpeg'],
            self::DOT_MP4 => ['video/mp4'],
            self::DOT_MPEG => ['video/mpeg'],
            self::DOT_ODP => ['application/vnd.oasis.opendocument.presentation'],
            self::DOT_ODS => ['application/vnd.oasis.opendocument.spreadsheet'],
            self::DOT_ODT => ['application/vnd.oasis.opendocument.text'],
            self::DOT_OGA, self::DOT_OPUS => ['audio/ogg'],
            self::DOT_OGV => ['video/ogg'],
            self::DOT_PDF => ['application/pdf'],
            self::DOT_PNG => ['image/png'],
            self::DOT_PPT => ['application/vnd.ms-powerpoint'],
            self::DOT_PPTX => ['application/vnd.openxmlformats-officedocument.presentationml.presentation'],
            self::DOT_RAR => ['application/vnd.rar'],
            self::DOT_RTF => ['application/rtf'],
            self::DOT_SVG => ['image/svg+xml'],
            self::DOT_TAR => ['application/x-tar'],
            self::DOT_TIF, self::DOT_TIFF => ['image/tiff'],
            self::DOT_TXT => ['text/plain'],
            self::DOT_WAV => ['audio/wav'],
            self::DOT_WEBA => ['audio/webm'],
            self::DOT_WEBM => ['video/webm'],
            self::DOT_WEBP => ['image/webp'],
            self::DOT_XLS => ['application/vnd.ms-excel'],
            self::DOT_XLSX => ['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
            self::DOT_XML => ['application/xml', 'text/xml'],
            self::DOT_ZIP => ['application/x-zip-compressed', 'application/zip'],
        };
    }

    public function mimeTypeIsValid(string $mimeType): bool
    {
        return in_array($mimeType, self::mimeTypes());
    }

    public static function parse(string $value): FileExtension
    {
        $lowerValue = strtolower($value);

        if (str_starts_with($lowerValue, '.')) {
            return self::from($lowerValue);
        } else {
            return self::from(".$lowerValue");
        }
    }

    public static function tryParse(string $value): ?FileExtension
    {
        try {
            return self::parse($value);
        } catch (Throwable) {
            return null;
        }
    }
}
