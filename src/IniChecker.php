<?php namespace AndyBeak\IniChecker;

class IniChecker
{
    /**
     * Return value of strcasecmp if the strings are the same
     */
    const STRINGS_ARE_THE_SAME = 0;

    /**
     * Offset of the recommended value in the subarray of values
     */
    const RECOMMENDED_OFFSET = 0;

    /**
     * Offset of the default value in the subarray of values
     */
    const DEFAULT_OFFSET = 1;

    /**
     * Associative array of 'Setting' => ['Recommended Value', 'Default Value']
     * @var array
     */
    static $recommendations = [
        'display_errors'                 => ['Off', 'On'],
        'display_startup_errors'         => ['Off', 'On'],
        'error_reporting'                => ['Off', E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED],
        'log_errors'                     => ['On', 'Off'],
        'max_input_time'                 => [60, -1],
        'output_buffering'               => [4096, 'Off'],
        'register_argc_argv'             => ['Off', 'On'],
        'request_order'                  => ['GP', null],
        'session.gc_divisor'             => [1000, 100],
        'session.sid_bits_per_character' => [5, 4],
        'short_open_tag'                 => ['Off', 'On'],
        'variables_order'                => ['GPCS', 'EGPCS']
    ];

    public static function getIncorrectIniSettings(bool $tryToSet = false): array
    {
        $wrongSettings = [];

        foreach (self::$recommendations as $setting => $value) {

            $actualSetting = ini_get($setting);

            if ($actualSetting === '') {
                $actualSetting = $value[self::DEFAULT_OFFSET];
            }

            $recommendedSetting = $value[self::RECOMMENDED_OFFSET];

            if (strcasecmp($actualSetting, $recommendedSetting) !== self::STRINGS_ARE_THE_SAME) {

                $wrongSettings[$setting] = $actualSetting;

                if ($tryToSet) {

                    ini_set($setting, $recommendedSetting);

                }

            }
        }

        return $wrongSettings;
    }
}