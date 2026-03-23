<?php
/**
 * Plugin Name: Scout Codes & Signes
 * Description: Codes secrets scouts — Code du jour, encodeur de messages, et référence des codes. Shortcodes: [scout_code_du_jour], [scout_encodeur], [scout_codes_reference]
 * Version: 1.0.0
 * Author: 5e Groupe scout Grand-Moulin
 * Text Domain: scout-codes
 * Domain Path: /languages
 */

defined('ABSPATH') || exit;

define('SCOUT_CODES_DIR', plugin_dir_path(__FILE__));
define('SCOUT_CODES_URL', plugin_dir_url(__FILE__));

add_action('plugins_loaded', function () {
    load_plugin_textdomain('scout-codes', false, dirname(plugin_basename(__FILE__)) . '/languages');
});

// Reload textdomain for user locale in admin
add_filter('locale', function ($locale) {
    if (is_admin() && function_exists('wp_get_current_user')) {
        $user = wp_get_current_user();
        if ($user->exists()) {
            $user_locale = get_user_meta($user->ID, 'locale', true);
            if ($user_locale) {
                static $loaded = false;
                if (!$loaded) {
                    $loaded = true;
                    $mofile = SCOUT_CODES_DIR . 'languages/scout-codes-' . $user_locale . '.mo';
                    if (file_exists($mofile)) {
                        unload_textdomain('scout-codes');
                        load_textdomain('scout-codes', $mofile);
                    }
                }
                return $user_locale;
            }
        }
    }
    return $locale;
});

// ═══════════ CODE DEFINITIONS ═══════════
function scout_codes_get_all() {
    return [
        'morse' => [
            'name' => __('Code Morse', 'scout-codes'),
            'icon' => '📡',
            'description' => __('Inventé par Samuel Morse en 1836. Points et tirets transmis par télégraphe.', 'scout-codes'),
            'map' => [
                'A'=>'.-','B'=>'-...','C'=>'-.-.','D'=>'-..','E'=>'.','F'=>'..-.','G'=>'--.','H'=>'....','I'=>'..','J'=>'.---',
                'K'=>'-.-','L'=>'.-..','M'=>'--','N'=>'-.','O'=>'---','P'=>'.--.','Q'=>'--.-','R'=>'.-.','S'=>'...','T'=>'-',
                'U'=>'..-','V'=>'...-','W'=>'.--','X'=>'-..-','Y'=>'-.--','Z'=>'--..',
                '0'=>'-----','1'=>'.----','2'=>'..---','3'=>'...--','4'=>'....-','5'=>'.....','6'=>'-....','7'=>'--...','8'=>'---..','9'=>'----.',
            ],
            'separator' => ' / ',
        ],
        'cesar' => [
            'name' => __('Chiffre de César', 'scout-codes'),
            'icon' => '🏛️',
            'description' => __('Décalage de l\'alphabet. César utilisait un décalage de 3 lettres.', 'scout-codes'),
            'shift' => 3,
        ],
        'atbash' => [
            'name' => __('Chiffre Atbash', 'scout-codes'),
            'icon' => '🔄',
            'description' => __('Substitution miroir : A↔Z, B↔Y, C↔X, etc. D\'origine hébraïque.', 'scout-codes'),
        ],
        'binaire' => [
            'name' => __('Code binaire (ASCII)', 'scout-codes'),
            'icon' => '💻',
            'description' => __('Chaque lettre est représentée par 8 bits (0 et 1).', 'scout-codes'),
        ],
        'pigpen' => [
            'name' => __('Pigpen (Franc-maçon)', 'scout-codes'),
            'icon' => '✏️',
            'description' => __('Code géométrique utilisé par les Francs-maçons au XVIIIe siècle.', 'scout-codes'),
            'map' => [
                'A'=>'⌐','B'=>'⌐·','C'=>'⌐.','D'=>'⌐:','E'=>'⌐.·','F'=>'⌐..','G'=>'⌐∟','H'=>'⌐∟·','I'=>'⌐∟.',
                'J'=>'△','K'=>'△·','L'=>'△.','M'=>'▽','N'=>'▽·','O'=>'▽.','P'=>'◁','Q'=>'◁·','R'=>'◁.',
                'S'=>'▷','T'=>'▷·','U'=>'▷.','V'=>'◇','W'=>'◇·','X'=>'◇.',
                'Y'=>'□','Z'=>'□·',
            ],
        ],
        'semaphore' => [
            'name' => __('Sémaphore (drapeaux)', 'scout-codes'),
            'icon' => '🚩',
            'description' => __('Communication par positions de drapeaux. Utilisé en mer.', 'scout-codes'),
            'map' => [
                'A'=>'↙','B'=>'←','C'=>'↖','D'=>'↑','E'=>'→','F'=>'↗','G'=>'↓',
                'H'=>'↙←','I'=>'↙↖','J'=>'↑↗','K'=>'↙↑','L'=>'↙→','M'=>'↙↗','N'=>'↙↓',
                'O'=>'←↖','P'=>'←↑','Q'=>'←→','R'=>'←↗','S'=>'←↓','T'=>'↖↑',
                'U'=>'↖→','V'=>'↑↓','W'=>'↗→','X'=>'↗↓','Y'=>'↖↗','Z'=>'↓→',
            ],
            'separator' => ' ',
        ],
        'braille' => [
            'name' => __('Braille', 'scout-codes'),
            'icon' => '⠿',
            'description' => __('Système tactile à 6 points inventé par Louis Braille en 1824.', 'scout-codes'),
            'map' => [
                'A'=>'⠁','B'=>'⠃','C'=>'⠉','D'=>'⠙','E'=>'⠑','F'=>'⠋','G'=>'⠛','H'=>'⠓','I'=>'⠊','J'=>'⠚',
                'K'=>'⠅','L'=>'⠇','M'=>'⠍','N'=>'⠝','O'=>'⠕','P'=>'⠏','Q'=>'⠟','R'=>'⠗','S'=>'⠎','T'=>'⠞',
                'U'=>'⠥','V'=>'⠧','W'=>'⠺','X'=>'⠭','Y'=>'⠽','Z'=>'⠵',
            ],
            'separator' => '',
        ],
        'navajo' => [
            'name' => __('Code Navajo', 'scout-codes'),
            'icon' => '🦅',
            'description' => __('Inspiré des Code Talkers de la Seconde Guerre mondiale.', 'scout-codes'),
            'map' => [
                'A'=>'wol-la-chee','B'=>'shush','C'=>'moasi','D'=>'be','E'=>'dzeh','F'=>'ma-e',
                'G'=>'klizzie','H'=>'lin','I'=>'tkin','J'=>'tkele-cho-gi','K'=>'klizzie-yazzie','L'=>'dibeh-yazzie',
                'M'=>'na-as-tso-si','N'=>'nesh-chee','O'=>'ne-ahs-jah','P'=>'bi-sodih','Q'=>'ca-yeilth','R'=>'gah',
                'S'=>'dibeh','T'=>'than-zie','U'=>'no-da-ih','V'=>'a-keh-di-glini','W'=>'gloe-ih','X'=>'al-na-as-dzoh',
                'Y'=>'tsah-as-zih','Z'=>'besh-do-tliz',
            ],
            'separator' => ' · ',
        ],
    ];
}

// ═══════════ ENCODER ENGINE ═══════════
function scout_codes_encode(string $text, string $code_type, int $shift = 3): string {
    $codes = scout_codes_get_all();
    $text = mb_strtoupper(trim($text));

    switch ($code_type) {
        case 'cesar':
            $result = '';
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $c = mb_substr($text, $i, 1);
                if (preg_match('/[A-Z]/', $c)) {
                    $result .= chr(((ord($c) - 65 + $shift) % 26) + 65);
                } else {
                    $result .= $c;
                }
            }
            return $result;

        case 'atbash':
            $result = '';
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $c = mb_substr($text, $i, 1);
                if (preg_match('/[A-Z]/', $c)) {
                    $result .= chr(90 - (ord($c) - 65));
                } else {
                    $result .= $c;
                }
            }
            return $result;

        case 'binaire':
            $result = [];
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $c = mb_substr($text, $i, 1);
                if ($c === ' ') { $result[] = '·'; continue; }
                $result[] = str_pad(decbin(ord($c)), 8, '0', STR_PAD_LEFT);
            }
            return implode(' ', $result);

        default:
            // Map-based codes (morse, braille, semaphore, etc.)
            if (!isset($codes[$code_type]) || !isset($codes[$code_type]['map'])) return $text;
            $map = $codes[$code_type]['map'];
            $sep = $codes[$code_type]['separator'] ?? ' ';
            $result = [];
            for ($i = 0; $i < mb_strlen($text); $i++) {
                $c = mb_substr($text, $i, 1);
                if ($c === ' ') { $result[] = '  '; continue; }
                // Remove accents for lookup
                $clean = strtr($c, 'ÀÂÄÉÈÊËÏÎÔÙÛÜŸÇŒÆ', 'AAAEEEEIIOOUUYCOEA');
                $result[] = $map[$clean] ?? $c;
            }
            return implode($sep, $result);
    }
}

// ═══════════ SHORTCODE: CODE DU JOUR ═══════════
add_shortcode('scout_code_du_jour', function($atts) {
    $atts = shortcode_atts(['code' => '', 'message' => ''], $atts);

    $codes = scout_codes_get_all();
    $code_keys = array_keys($codes);

    // Determine which code to use
    if (!empty($atts['code']) && isset($codes[$atts['code']])) {
        $today_code = $atts['code'];
    } else {
        // Random based on day — changes daily
        $day_seed = intval(date('Ymd'));
        $today_code = $code_keys[$day_seed % count($code_keys)];
        // Allow admin override
        $forced = get_option('scout_codes_forced_code', '');
        if ($forced && isset($codes[$forced])) $today_code = $forced;
    }

    $code_info = $codes[$today_code];

    // Determine the message
    $messages_pool = get_option('scout_codes_messages', [
        'Toujours prêt!',
        'De notre mieux!',
        'Un scout sourit et siffle',
        'Le scout est ami de tous',
        'Un scout est loyal',
        'Le feu de camp unit les coeurs',
        'La nature est notre maison',
        'Entraide et partage',
        'Le respect commence par soi',
        'Chaque jour une bonne action',
    ]);

    if (!empty($atts['message'])) {
        $message = $atts['message'];
    } elseif (!empty($messages_pool)) {
        $message = $messages_pool[$day_seed % count($messages_pool)];
    } else {
        $message = 'Toujours prêt!';
    }

    $encoded = scout_codes_encode($message, $today_code);

    ob_start(); ?>
    <div class="scout-cotd" style="background:linear-gradient(135deg,#003320,#007748);border-radius:16px;padding:28px;color:#fff;max-width:600px;margin:20px auto;box-shadow:0 8px 24px rgba(0,119,72,0.2)">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:16px">
            <div>
                <div style="font-size:12px;opacity:0.6;text-transform:uppercase;letter-spacing:1px"><?php esc_html_e('Code du jour', 'scout-codes'); ?></div>
                <div style="font-size:1.3rem;font-weight:700"><?php echo esc_html($code_info['icon'] . ' ' . $code_info['name']); ?></div>
            </div>
            <div style="font-size:13px;opacity:0.6"><?php echo date_i18n('j F Y'); ?></div>
        </div>
        <div style="background:rgba(255,255,255,0.1);border-radius:10px;padding:16px;margin-bottom:12px;font-family:monospace;font-size:<?php echo ($today_code === 'braille') ? '1.4rem' : '0.95rem'; ?>;word-break:break-all;line-height:1.8;letter-spacing:<?php echo ($today_code === 'braille') ? '4px' : '1px'; ?>">
            <?php echo esc_html($encoded); ?>
        </div>
        <details style="cursor:pointer">
            <summary style="font-size:13px;opacity:0.7"><?php echo '💡 ' . esc_html__('Indice : cliquez pour voir la réponse', 'scout-codes'); ?></summary>
            <div style="margin-top:8px;background:rgba(255,180,0,0.15);padding:10px 14px;border-radius:8px;font-weight:600">
                <?php echo esc_html($message); ?>
            </div>
        </details>
        <div style="font-size:11px;opacity:0.5;margin-top:10px"><?php echo esc_html($code_info['description']); ?></div>
    </div>
    <?php return ob_get_clean();
});

// ═══════════ SHORTCODE: ENCODEUR ═══════════
add_shortcode('scout_encodeur', function($atts) {
    $codes = scout_codes_get_all();
    $rest_url = esc_url(rest_url('scout-codes/v1/encode'));
    $nonce = wp_create_nonce('wp_rest');

    ob_start(); ?>
    <div class="scout-encoder" style="max-width:600px;margin:20px auto">
        <div style="background:#fff;border:1px solid #e0ddd4;border-radius:12px;padding:24px;box-shadow:0 2px 8px rgba(0,0,0,0.06)">
            <h3 style="color:#007748;margin:0 0 16px"><?php echo '🔐 ' . esc_html__('Encodeur de messages secrets', 'scout-codes'); ?></h3>
            <textarea id="scEncInput" rows="3" placeholder="<?php esc_attr_e('Entrez votre message ici...', 'scout-codes'); ?>" style="width:100%;padding:12px;border:1.5px solid #d0d0c8;border-radius:8px;font-size:14px;font-family:inherit;resize:vertical;margin-bottom:12px"></textarea>
            <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px">
                <select id="scEncCode" style="flex:1;padding:10px;border:1.5px solid #d0d0c8;border-radius:8px;font-size:14px">
                    <?php foreach ($codes as $key => $info): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="scEncShiftWrap" style="display:none">
                    <label style="font-size:12px;color:#6a6a62"><?php esc_html_e('Décalage:', 'scout-codes'); ?></label>
                    <input type="number" id="scEncShift" value="3" min="1" max="25" style="width:60px;padding:8px;border:1.5px solid #d0d0c8;border-radius:8px">
                </div>
                <button onclick="scEncode()" style="padding:10px 20px;background:#007748;color:#fff;border:none;border-radius:8px;font-weight:600;cursor:pointer;font-size:14px"><?php esc_html_e('Encoder →', 'scout-codes'); ?></button>
            </div>
            <div id="scEncResult" style="display:none;background:#f9f8f5;border:2px solid #e0ddd4;border-radius:10px;padding:16px;font-family:monospace;font-size:0.95rem;word-break:break-all;line-height:1.8;position:relative">
                <button onclick="scCopyResult()" style="position:absolute;top:8px;right:8px;background:#007748;color:#fff;border:none;border-radius:6px;padding:4px 10px;font-size:11px;cursor:pointer"><?php echo '📋 ' . esc_html__('Copier', 'scout-codes'); ?></button>
                <div id="scEncOutput"></div>
            </div>
        </div>
    </div>
    <script>
    document.getElementById('scEncCode').addEventListener('change', function(){
        document.getElementById('scEncShiftWrap').style.display = this.value === 'cesar' ? 'flex' : 'none';
    });
    function scEncode(){
        var text = document.getElementById('scEncInput').value;
        var code = document.getElementById('scEncCode').value;
        var shift = document.getElementById('scEncShift').value;
        if(!text.trim()) return;
        fetch('<?php echo $rest_url; ?>?text=' + encodeURIComponent(text) + '&code=' + code + '&shift=' + shift)
        .then(function(r){return r.json()})
        .then(function(data){
            document.getElementById('scEncOutput').textContent = data.encoded;
            document.getElementById('scEncResult').style.display = 'block';
        });
    }
    var scL10n = <?php echo wp_json_encode([
        'copied' => __('Copié!', 'scout-codes'),
        'copy'   => __('Copier', 'scout-codes'),
    ]); ?>;
    function scCopyResult(){
        navigator.clipboard.writeText(document.getElementById('scEncOutput').textContent);
        var btn = event.target; btn.textContent = '✅ ' + scL10n.copied; setTimeout(function(){ btn.textContent = '📋 ' + scL10n.copy; }, 1500);
    }
    document.getElementById('scEncInput').addEventListener('keydown', function(e){ if(e.key==='Enter'&&!e.shiftKey){e.preventDefault();scEncode();}});
    </script>
    <?php return ob_get_clean();
});

// ═══════════ SHORTCODE: REFERENCE TABLE ═══════════
add_shortcode('scout_codes_reference', function($atts) {
    $atts = shortcode_atts(['code' => ''], $atts);
    $codes = scout_codes_get_all();

    // If specific code requested
    if (!empty($atts['code']) && isset($codes[$atts['code']])) {
        $codes = [$atts['code'] => $codes[$atts['code']]];
    }

    ob_start(); ?>
    <div class="scout-codes-ref" style="max-width:700px;margin:20px auto">
    <?php foreach ($codes as $key => $info):
        if (!isset($info['map']) && !in_array($key, ['cesar', 'atbash', 'binaire'])) continue;
    ?>
    <div style="background:#fff;border:1px solid #e0ddd4;border-radius:12px;padding:20px;margin-bottom:16px;box-shadow:0 2px 6px rgba(0,0,0,0.04)">
        <h3 style="color:#007748;margin:0 0 4px"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></h3>
        <p style="font-size:0.82rem;color:#6a6a62;margin:0 0 12px"><?php echo esc_html($info['description']); ?></p>
        <?php if (isset($info['map'])): ?>
        <div style="display:flex;flex-wrap:wrap;gap:4px">
            <?php foreach ($info['map'] as $letter => $symbol): ?>
            <div style="background:#f9f8f5;border:1px solid #e0ddd4;border-radius:6px;padding:4px 8px;text-align:center;min-width:44px">
                <div style="font-weight:700;font-size:12px;color:#007748"><?php echo esc_html($letter); ?></div>
                <div style="font-family:monospace;font-size:<?php echo ($key === 'braille') ? '18px' : '11px'; ?>"><?php echo esc_html($symbol); ?></div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php elseif ($key === 'cesar'): ?>
        <div style="font-family:monospace;font-size:13px;background:#f9f8f5;padding:12px;border-radius:8px">
            <div>A B C D E F G H I J K L M N O P Q R S T U V W X Y Z</div>
            <div style="color:#007748;font-weight:700">D E F G H I J K L M N O P Q R S T U V W X Y Z A B C</div>
            <div style="font-size:11px;color:#6a6a62;margin-top:4px"><?php echo '↑ ' . esc_html__('Décalage de 3 (modifiable dans l\'encodeur)', 'scout-codes'); ?></div>
        </div>
        <?php elseif ($key === 'atbash'): ?>
        <div style="font-family:monospace;font-size:13px;background:#f9f8f5;padding:12px;border-radius:8px">
            <div>A B C D E F G H I J K L M N O P Q R S T U V W X Y Z</div>
            <div style="color:#007748;font-weight:700">Z Y X W V U T S R Q P O N M L K J I H G F E D C B A</div>
        </div>
        <?php elseif ($key === 'binaire'): ?>
        <div style="font-family:monospace;font-size:11px;display:flex;flex-wrap:wrap;gap:4px">
            <?php for ($i = 65; $i <= 90; $i++): ?>
            <div style="background:#f9f8f5;border:1px solid #e0ddd4;border-radius:6px;padding:4px 6px;text-align:center">
                <div style="font-weight:700;color:#007748"><?php echo chr($i); ?></div>
                <div><?php echo str_pad(decbin($i), 8, '0', STR_PAD_LEFT); ?></div>
            </div>
            <?php endfor; ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endforeach; ?>
    </div>
    <?php return ob_get_clean();
});

// ═══════════ REST API for encoder ═══════════
add_action('rest_api_init', function() {
    register_rest_route('scout-codes/v1', '/encode', [
        'methods' => 'GET',
        'callback' => function($request) {
            $text = sanitize_text_field($request->get_param('text'));
            $code = sanitize_key($request->get_param('code'));
            $shift = intval($request->get_param('shift') ?: 3);
            return new WP_REST_Response(['encoded' => scout_codes_encode($text, $code, $shift)]);
        },
        'permission_callback' => '__return_true',
    ]);
});

// ═══════════ ADMIN: Message management ═══════════
add_action('admin_menu', function() {
    add_options_page(
        __('Codes scouts', 'scout-codes'),
        '⚜️ ' . __('Codes scouts', 'scout-codes'),
        'manage_options',
        'scout-codes',
        'scout_codes_admin_page'
    );
});

function scout_codes_admin_page() {
    if (isset($_POST['scout_save_messages']) && wp_verify_nonce($_POST['_sc_nonce'], 'scout_save_messages')) {
        $messages = array_filter(array_map('sanitize_text_field', explode("\n", $_POST['messages'] ?? '')));
        update_option('scout_codes_messages', $messages);
        echo '<div class="notice notice-success"><p>' . esc_html__('Messages sauvegardés!', 'scout-codes') . '</p></div>';
    }
    if (isset($_POST['scout_save_cotd']) && wp_verify_nonce($_POST['_sc_nonce2'], 'scout_save_cotd')) {
        update_option('scout_codes_forced_code', sanitize_key($_POST['forced_code'] ?? ''));
        echo '<div class="notice notice-success"><p>' . esc_html__('Code du jour mis à jour!', 'scout-codes') . '</p></div>';
    }

    $messages = get_option('scout_codes_messages', [
        'Toujours prêt!', 'De notre mieux!', 'Un scout sourit et siffle',
        'Le scout est ami de tous', 'Un scout est loyal', 'Le feu de camp unit les coeurs',
        'La nature est notre maison', 'Entraide et partage', 'Le respect commence par soi',
        'Chaque jour une bonne action',
    ]);
    $forced = get_option('scout_codes_forced_code', '');
    $codes = scout_codes_get_all();
    ?>
    <div class="wrap">
        <h1><?php echo '⚜️ ' . esc_html__('Codes scouts — Configuration', 'scout-codes'); ?></h1>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0"><?php echo '🎯 ' . esc_html__('Code du jour — Forcer un code', 'scout-codes'); ?></h2>
            <p class="description"><?php esc_html_e('Par défaut, le code change automatiquement chaque jour. Vous pouvez forcer un code spécifique.', 'scout-codes'); ?></p>
            <form method="post">
                <?php wp_nonce_field('scout_save_cotd', '_sc_nonce2'); ?>
                <select name="forced_code" style="padding:8px;margin-right:8px">
                    <option value="" <?php selected($forced, ''); ?>><?php echo '🎲 ' . esc_html__('Automatique (change chaque jour)', 'scout-codes'); ?></option>
                    <?php foreach ($codes as $key => $info): ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected($forced, $key); ?>><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="scout_save_cotd" class="button button-primary"><?php esc_html_e('Appliquer', 'scout-codes'); ?></button>
                <?php if ($forced): ?>
                <span style="margin-left:8px;color:#e67e22"><?php echo '⚠️ ' . esc_html(sprintf(__('Code forcé : %s', 'scout-codes'), $codes[$forced]['name'] ?? $forced)); ?></span>
                <?php endif; ?>
            </form>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0"><?php echo '💬 ' . esc_html__('Messages à encoder', 'scout-codes'); ?></h2>
            <p class="description"><?php esc_html_e('Un message par ligne. Le système choisit un message différent chaque jour pour le "Code du jour".', 'scout-codes'); ?></p>
            <form method="post">
                <?php wp_nonce_field('scout_save_messages', '_sc_nonce'); ?>
                <textarea name="messages" rows="12" style="width:100%;font-family:monospace;padding:12px;border:1px solid #d0d0c8;border-radius:8px"><?php echo esc_textarea(implode("\n", $messages)); ?></textarea>
                <div style="margin-top:8px">
                    <button type="submit" name="scout_save_messages" class="button button-primary"><?php echo '💾 ' . esc_html__('Sauvegarder les messages', 'scout-codes'); ?></button>
                    <span style="margin-left:12px;font-size:12px;color:#6a6a62"><?php echo esc_html(sprintf(__('%d messages configurés', 'scout-codes'), count($messages))); ?></span>
                </div>
            </form>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0"><?php echo '📋 ' . esc_html__('Shortcodes disponibles', 'scout-codes'); ?></h2>
            <table class="form-table">
                <tr><th><code>[scout_code_du_jour]</code></th><td><?php esc_html_e('Affiche le code du jour avec un message encodé. Change automatiquement chaque jour.', 'scout-codes'); ?><br><?php echo esc_html__('Options:', 'scout-codes'); ?> <code>[scout_code_du_jour code="morse"]</code> <?php esc_html_e('pour forcer un code,', 'scout-codes'); ?> <code>[scout_code_du_jour message="Mon message"]</code> <?php esc_html_e('pour un message fixe.', 'scout-codes'); ?></td></tr>
                <tr><th><code>[scout_encodeur]</code></th><td><?php esc_html_e('Outil interactif pour encoder des messages dans n\'importe quel code scout.', 'scout-codes'); ?></td></tr>
                <tr><th><code>[scout_codes_reference]</code></th><td><?php esc_html_e('Tableau de référence de tous les codes.', 'scout-codes'); ?><br><?php echo esc_html__('Options:', 'scout-codes'); ?> <code>[scout_codes_reference code="morse"]</code> <?php esc_html_e('pour afficher un seul code.', 'scout-codes'); ?></td></tr>
            </table>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0"><?php echo '🖼️ ' . esc_html__('Portraits des inventeurs', 'scout-codes'); ?></h2>
            <p class="description"><?php printf(__('Téléversez des portraits depuis votre ordinateur. Utilisez des images du domaine public (Wikimedia Commons). Les images doivent être importées dans la <a href="%s">bibliothèque de médias</a> d\'abord.', 'scout-codes'), esc_url(admin_url('upload.php'))); ?></p>
            <?php if (isset($_POST['scout_save_portraits']) && wp_verify_nonce($_POST['_sc_portraits'], 'scout_save_portraits')) {
                foreach (scout_codes_get_all_pages() as $slug => $info) {
                    $url = sanitize_url($_POST['portrait_' . $slug] ?? '');
                    update_option('scout_codes_portrait_' . $slug, $url);
                }
                echo '<div class="notice notice-success"><p>' . esc_html__('Portraits sauvegardés!', 'scout-codes') . '</p></div>';
            } ?>
            <form method="post">
            <?php wp_nonce_field('scout_save_portraits', '_sc_portraits'); ?>
            <table class="widefat" style="max-width:700px">
                <thead><tr><th><?php esc_html_e('Code', 'scout-codes'); ?></th><th><?php esc_html_e('URL de l\'image (depuis la bibliothèque de médias)', 'scout-codes'); ?></th><th style="width:60px"><?php esc_html_e('Aperçu', 'scout-codes'); ?></th></tr></thead>
                <tbody>
                <?php foreach (scout_codes_get_all_pages() as $slug => $info):
                    $portrait_url = get_option('scout_codes_portrait_' . $slug, '');
                ?>
                <tr>
                    <td><strong><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></strong></td>
                    <td><input type="url" name="portrait_<?php echo esc_attr($slug); ?>" value="<?php echo esc_attr($portrait_url); ?>" style="width:100%" placeholder="https://www.5escoutgrandmoulin.org/wp-content/uploads/..."></td>
                    <td><?php if ($portrait_url): ?><img src="<?php echo esc_url($portrait_url); ?>" style="width:40px;height:40px;object-fit:cover;border-radius:6px"><?php else: ?>—<?php endif; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <p style="margin-top:8px"><button type="submit" name="scout_save_portraits" class="button button-primary"><?php echo '💾 ' . esc_html__('Sauvegarder les portraits', 'scout-codes'); ?></button></p>
            <p class="description" style="margin-top:8px"><?php printf(__('💡 <strong>Comment faire :</strong> 1) Téléchargez une image de Wikimedia Commons sur votre ordinateur. 2) Importez-la dans <a href="%s">Médias → Ajouter</a>. 3) Copiez l\'URL de l\'image et collez-la ici.', 'scout-codes'), esc_url(admin_url('media-new.php'))); ?></p>
            </form>
        </div>

            <h2 style="margin-top:0"><?php echo '🧪 ' . esc_html__('Aperçu — Code du jour', 'scout-codes'); ?></h2>
            <?php echo do_shortcode('[scout_code_du_jour]'); ?>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0"><?php echo '📄 ' . esc_html__('Pages générées', 'scout-codes'); ?></h2>
            <?php if (isset($_GET['recreated'])): ?>
                <div class="notice notice-success"><p><?php esc_html_e('Pages recréées! Visitez la page d\'accueil pour déclencher la création.', 'scout-codes'); ?></p></div>
            <?php endif; ?>
            <p class="description"><?php esc_html_e('Le plugin crée automatiquement une page par code scout. Si les pages ont été supprimées, vous pouvez les recréer.', 'scout-codes'); ?></p>
            <?php
            $hub = get_page_by_path('codes-scouts');
            if ($hub): ?>
                <p>✅ <strong><a href="<?php echo get_permalink($hub); ?>">Codes scouts (hub)</a></strong></p>
                <ul style="margin-left:20px">
                <?php foreach (scout_codes_get_all_pages() as $slug => $info):
                    $page = get_page_by_path('codes-scouts/code-' . $slug);
                    if ($page): ?>
                        <li><?php echo esc_html($info['icon']); ?> <a href="<?php echo get_permalink($page); ?>"><?php echo esc_html($info['name']); ?></a></li>
                    <?php else: ?>
                        <li style="color:#c0392b"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?> — <?php echo '⚠️ ' . esc_html__('page manquante', 'scout-codes'); ?></li>
                    <?php endif; endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color:#e67e22"><?php echo '⚠️ ' . esc_html__('Pages non encore créées. Elles seront créées automatiquement au prochain chargement d\'une page admin.', 'scout-codes'); ?></p>
            <?php endif; ?>
            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" style="margin-top:12px">
                <?php wp_nonce_field('scout_recreate_pages'); ?>
                <input type="hidden" name="action" value="scout_recreate_code_pages">
                <button type="submit" class="button" onclick="return confirm('<?php echo esc_js(__('Supprimer et recréer toutes les pages de codes?', 'scout-codes')); ?>')"><?php echo '🔄 ' . esc_html__('Recréer toutes les pages', 'scout-codes'); ?></button>
            </form>
        </div>
    </div>
    <?php
}

// Update code du jour shortcode to respect forced code
add_filter('scout_codes_today_code', function($code) {
    $forced = get_option('scout_codes_forced_code', '');
    if ($forced && isset(scout_codes_get_all()[$forced])) return $forced;
    return $code;
});

// ═══════════ FULL CODE PAGE LIST (for pages with rich content) ═══════════
function scout_codes_get_all_pages() {
    return [
        'morse' => ['name' => __('Code Morse', 'scout-codes'), 'icon' => '📡', 'file' => 'code-morse.php',
            'description' => __('Points et tirets — le langage universel des scouts. Avec audio!', 'scout-codes')],
        'braille' => ['name' => __('Braille', 'scout-codes'), 'icon' => '⠿', 'file' => 'code-braille.php',
            'description' => __('Système tactile à 6 points inventé par Louis Braille en 1824.', 'scout-codes')],
        'tictactoc' => ['name' => __('Tic-Tac-Toc (Pigpen)', 'scout-codes'), 'icon' => '✏️', 'file' => 'code-tictactoc.php',
            'description' => __('Code géométrique caché dans une grille de morpion.', 'scout-codes')],
        'semaphore' => ['name' => __('Sémaphore, Grec & Runes', 'scout-codes'), 'icon' => '🚩', 'file' => 'code-grec-rune-semaphore.php',
            'description' => __('Drapeaux, alphabet grec et runes nordiques.', 'scout-codes')],
        'substitution' => ['name' => __('César & substitution', 'scout-codes'), 'icon' => '🏛️', 'file' => 'code-substitution.php',
            'description' => __('Décalage de l\'alphabet et substitutions personnalisées.', 'scout-codes')],
        'ascii' => ['name' => __('Code binaire (ASCII)', 'scout-codes'), 'icon' => '💻', 'file' => 'code-ascii.php',
            'description' => __('Chaque lettre en bits — le langage des ordinateurs.', 'scout-codes')],
        'telephone' => ['name' => __('Code téléphone', 'scout-codes'), 'icon' => '📱', 'file' => 'code-telephone.php',
            'description' => __('Les lettres cachées dans le clavier du téléphone.', 'scout-codes')],
        'samourais' => ['name' => __('Code des Samouraïs', 'scout-codes'), 'icon' => '⚔️', 'file' => 'code-samourais.php',
            'description' => __('Un code inspiré des guerriers japonais.', 'scout-codes')],
        'chinois' => ['name' => __('Code chinois', 'scout-codes'), 'icon' => '🀄', 'file' => 'code-chinois.php',
            'description' => __('Un code basé sur les traits des caractères chinois.', 'scout-codes')],
        'musique' => ['name' => __('Code musical', 'scout-codes'), 'icon' => '🎵', 'file' => 'code-musique.php',
            'description' => __('Les notes de musique cachent des messages.', 'scout-codes')],
        'cle' => ['name' => __('Code à clé', 'scout-codes'), 'icon' => '🔑', 'file' => 'code-cle.php',
            'description' => __('Un code qui utilise un mot-clé secret pour encoder.', 'scout-codes')],
        'inverse-avocat' => ['name' => __('Code inversé & avocat', 'scout-codes'), 'icon' => '🔄', 'file' => 'code-inverse-avocat.php',
            'description' => __('Miroir, inversions et codes d\'avocat.', 'scout-codes')],
        'deux-grilles' => ['name' => __('Code des deux grilles', 'scout-codes'), 'icon' => '🔲', 'file' => 'code-deux-grilles.php',
            'description' => __('Deux grilles superposées pour un chiffrement visuel.', 'scout-codes')],
        'solaire' => ['name' => __('Code solaire', 'scout-codes'), 'icon' => '☀️', 'file' => 'code-solair.php',
            'description' => __('Un code inspiré des cadrans solaires.', 'scout-codes')],
    ];
}

// ═══════════ AUTO-CREATE PAGES ═══════════
add_action('admin_init', function() {
    if (!current_user_can('manage_options')) return;
    if (get_option('scout_codes_pages_version', 0) >= 2) return;

    // Delete old pages if upgrading
    $hub = get_page_by_path('codes-scouts');
    if ($hub) {
        $children = get_pages(['parent' => $hub->ID]);
        foreach ($children as $child) wp_delete_post($child->ID, true);
        wp_delete_post($hub->ID, true);
    }

    // Create parent "Codes scouts" page
    $parent_id = wp_insert_post([
        'post_title' => 'Codes scouts',
        'post_content' => '[scout_codes_hub]',
        'post_status' => 'publish',
        'post_type' => 'page',
        'post_name' => 'codes-scouts',
    ]);

    if ($parent_id && !is_wp_error($parent_id)) {
        $codes = scout_codes_get_all_pages();
        foreach ($codes as $slug => $info) {
            wp_insert_post([
                'post_title' => $info['name'],
                'post_content' => '[scout_code_page code="' . $slug . '"]',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_name' => 'code-' . $slug,
                'post_parent' => $parent_id,
            ]);
        }
    }

    update_option('scout_codes_pages_version', 2);
    update_option('scout_codes_pages_created', true);
});

// Admin button to recreate pages
add_action('admin_post_scout_recreate_code_pages', function() {
    if (!current_user_can('manage_options')) wp_die(esc_html__('Accès refusé', 'scout-codes'));
    check_admin_referer('scout_recreate_pages');
    delete_option('scout_codes_pages_version');
    delete_option('scout_codes_pages_created');
    // Delete existing code pages
    $pages = get_pages(['meta_key' => '_scout_code_page', 'meta_value' => '1']);
    foreach ($pages as $p) wp_delete_post($p->ID, true);
    $hub = get_page_by_path('codes-scouts');
    if ($hub) wp_delete_post($hub->ID, true);
    wp_redirect(admin_url('options-general.php?page=scout-codes&recreated=1'));
    exit;
});

// ═══════════ SHORTCODE: HUB PAGE ═══════════
add_shortcode('scout_codes_hub', function() {
    $codes = scout_codes_get_all_pages();
    ob_start(); ?>
    <div>
        <div style="background:linear-gradient(135deg,#003320,#007748);padding:48px 24px;color:#fff;text-align:center">
            <h2 style="font-size:2.2rem;margin-bottom:8px"><?php echo '🔐 ' . esc_html__('Codes & signes scouts', 'scout-codes'); ?></h2>
            <p style="opacity:0.7;font-size:0.95rem"><?php esc_html_e('Apprends les codes secrets utilisés par les scouts du monde entier!', 'scout-codes'); ?></p>
        </div>

        <div style="max-width:800px;margin:0 auto;padding:24px 20px">

        <?php echo do_shortcode('[scout_code_du_jour]'); ?>

        <h3 style="color:#007748;margin:32px 0 16px;font-size:1.1rem"><?php echo '📚 ' . esc_html__('Tous les codes', 'scout-codes'); ?></h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:12px;margin-bottom:32px">
            <?php foreach ($codes as $slug => $info):
                $page = get_page_by_path('codes-scouts/code-' . $slug);
                $url = $page ? get_permalink($page) : '#';
            ?>
            <a href="<?php echo esc_url($url); ?>" style="background:#fff;border:1px solid #e0ddd4;border-radius:12px;padding:20px;text-decoration:none;color:inherit;transition:all 0.2s;box-shadow:0 2px 6px rgba(0,0,0,0.04);display:block">
                <div style="font-size:2rem;margin-bottom:8px"><?php echo esc_html($info['icon']); ?></div>
                <div style="font-weight:700;color:#007748;margin-bottom:4px"><?php echo esc_html($info['name']); ?></div>
                <div style="font-size:0.78rem;color:#6a6a62;line-height:1.4"><?php echo esc_html($info['description']); ?></div>
            </a>
            <?php endforeach; ?>
        </div>

        <h3 style="color:#007748;margin:0 0 16px;font-size:1.1rem"><?php echo '🔐 ' . esc_html__('Encodeur', 'scout-codes'); ?></h3>
        <?php echo do_shortcode('[scout_encodeur]'); ?>
        </div><!-- /.inner container -->
    </div><!-- /.outer -->
    <?php return ob_get_clean();
});

// ═══════════ SHORTCODE: SINGLE CODE PAGE (file-based) ═══════════
add_shortcode('scout_code_page', function($atts) {
    $atts = shortcode_atts(['code' => ''], $atts);
    $all_pages = scout_codes_get_all_pages();
    $slug = sanitize_key($atts['code']);
    if (!isset($all_pages[$slug])) return '<p>' . esc_html__('Code inconnu.', 'scout-codes') . '</p>';
    $info = $all_pages[$slug];

    // Check if we have a rich content file
    $file = SCOUT_CODES_DIR . 'pages/' . $info['file'];
    if (!file_exists($file)) return '<p>' . esc_html__('Fichier de contenu introuvable.', 'scout-codes') . '</p>';

    ob_start(); ?>
    <div>
        <!-- Header (full width) -->
        <div style="background:linear-gradient(135deg,#003320,#007748);padding:40px 24px;color:#fff;position:relative;overflow:hidden">
            <div style="position:absolute;top:0;right:40px;font-size:10rem;opacity:0.06;line-height:1"><?php echo esc_html($info['icon']); ?></div>
            <div style="max-width:800px;margin:0 auto;position:relative">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('codes-scouts'))); ?>" style="color:rgba(255,255,255,0.6);text-decoration:none;font-size:13px"><?php echo '← ' . esc_html__('Tous les codes', 'scout-codes'); ?></a>
                <h1 style="font-size:2.4rem;margin:8px 0 4px"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></h1>
                <p style="opacity:0.7;font-size:0.95rem;max-width:500px"><?php echo esc_html($info['description']); ?></p>
            </div>
        </div>

        <!-- Rich content from static page -->
        <div class="scout-code-content">
            <?php include $file; ?>
        </div>

        <!-- Fun facts, history, and learn more -->
        <?php
        $code_slug = $slug;
        $fun_facts_file = SCOUT_CODES_DIR . 'includes/fun-facts.php';
        if (file_exists($fun_facts_file)) include $fun_facts_file;
        ?>

        <div style="text-align:center;padding:24px 20px 40px">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('codes-scouts'))); ?>" style="display:inline-block;padding:10px 24px;background:#007748;color:#fff;border-radius:8px;text-decoration:none;font-weight:600"><?php echo '← ' . esc_html__('Tous les codes', 'scout-codes'); ?></a>
        </div>
    </div>
    <?php return ob_get_clean();
});
