<?php

namespace Mkioschi\Support\Enums;

use Throwable;

enum FileExtension: string implements EnumContract
{
    case DOT_3G2 = '3g2';
    case DOT_3GP = '3gp';
    case DOT_7Z = '7z';
    case DOT_AVI = 'avi';
    case DOT_CSV = 'csv';
    case DOT_DOC = 'doc';
    case DOT_DOCX = 'docx';
    case DOT_GIF = 'gif';
    case DOT_ICO = 'ico';
    case DOT_JPEG = 'jpeg';
    case DOT_JPG = 'jpg';
    case DOT_JSON = 'json';
    case DOT_MP3 = 'mp3';
    case DOT_MP4 = 'mp4';
    case DOT_MPEG = 'mpeg';
    case DOT_ODP = 'odp';
    case DOT_ODS = 'ods';
    case DOT_ODT = 'odt';
    case DOT_OGA = 'oga';
    case DOT_OGV = 'ogv';
    case DOT_OPUS = 'opus';
    case DOT_PDF = 'pdf';
    case DOT_PNG = 'png';
    case DOT_PPT = 'ppt';
    case DOT_PPTX = 'pptx';
    case DOT_RAR = 'rar';
    case DOT_RTF = 'rtf';
    case DOT_SVG = 'svg';
    case DOT_TAR = 'tar';
    case DOT_TIF = 'tif';
    case DOT_TIFF = 'tiff';
    case DOT_TXT = 'txt';
    case DOT_WAV = 'wav';
    case DOT_WEBA = 'weba';
    case DOT_WEBM = 'webm';
    case DOT_WEBP = 'webp';
    case DOT_XLS = 'xls';
    case DOT_XLSX = 'xlsx';
    case DOT_XML = 'xml';
    case DOT_ZIP = 'zip';

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

    public static function parse(string $value): FileExtension
    {
        return self::from(
            strtolower(
                str_replace('.', '', $value)
            )
        );
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
