<?php
/**
 * Plugin Name: Scout Codes & Signes
 * Description: Codes secrets scouts — Code du jour, encodeur de messages, et référence des codes. Shortcodes: [scout_code_du_jour], [scout_encodeur], [scout_codes_reference]
 * Version: 1.0.0
 * Author: 5e Groupe scout Grand-Moulin
 * Text Domain: scout-codes
 */

defined('ABSPATH') || exit;

define('SCOUT_CODES_DIR', plugin_dir_path(__FILE__));
define('SCOUT_CODES_URL', plugin_dir_url(__FILE__));

// ═══════════ CODE DEFINITIONS ═══════════
function scout_codes_get_all() {
    return [
        'morse' => [
            'name' => 'Code Morse',
            'icon' => '📡',
            'description' => 'Inventé par Samuel Morse en 1836. Points et tirets transmis par télégraphe.',
            'map' => [
                'A'=>'.-','B'=>'-...','C'=>'-.-.','D'=>'-..','E'=>'.','F'=>'..-.','G'=>'--.','H'=>'....','I'=>'..','J'=>'.---',
                'K'=>'-.-','L'=>'.-..','M'=>'--','N'=>'-.','O'=>'---','P'=>'.--.','Q'=>'--.-','R'=>'.-.','S'=>'...','T'=>'-',
                'U'=>'..-','V'=>'...-','W'=>'.--','X'=>'-..-','Y'=>'-.--','Z'=>'--..',
                '0'=>'-----','1'=>'.----','2'=>'..---','3'=>'...--','4'=>'....-','5'=>'.....','6'=>'-....','7'=>'--...','8'=>'---..','9'=>'----.',
            ],
            'separator' => ' / ',
        ],
        'cesar' => [
            'name' => 'Chiffre de César',
            'icon' => '🏛️',
            'description' => 'Décalage de l\'alphabet. César utilisait un décalage de 3 lettres.',
            'shift' => 3,
        ],
        'atbash' => [
            'name' => 'Chiffre Atbash',
            'icon' => '🔄',
            'description' => 'Substitution miroir : A↔Z, B↔Y, C↔X, etc. D\'origine hébraïque.',
        ],
        'binaire' => [
            'name' => 'Code binaire (ASCII)',
            'icon' => '💻',
            'description' => 'Chaque lettre est représentée par 8 bits (0 et 1).',
        ],
        'pigpen' => [
            'name' => 'Pigpen (Franc-maçon)',
            'icon' => '✏️',
            'description' => 'Code géométrique utilisé par les Francs-maçons au XVIIIe siècle.',
            'map' => [
                'A'=>'⌐','B'=>'⌐·','C'=>'⌐.','D'=>'⌐:','E'=>'⌐.·','F'=>'⌐..','G'=>'⌐∟','H'=>'⌐∟·','I'=>'⌐∟.',
                'J'=>'△','K'=>'△·','L'=>'△.','M'=>'▽','N'=>'▽·','O'=>'▽.','P'=>'◁','Q'=>'◁·','R'=>'◁.',
                'S'=>'▷','T'=>'▷·','U'=>'▷.','V'=>'◇','W'=>'◇·','X'=>'◇.',
                'Y'=>'□','Z'=>'□·',
            ],
        ],
        'semaphore' => [
            'name' => 'Sémaphore (drapeaux)',
            'icon' => '🚩',
            'description' => 'Communication par positions de drapeaux. Utilisé en mer.',
            'map' => [
                'A'=>'↙','B'=>'←','C'=>'↖','D'=>'↑','E'=>'→','F'=>'↗','G'=>'↓',
                'H'=>'↙←','I'=>'↙↖','J'=>'↑↗','K'=>'↙↑','L'=>'↙→','M'=>'↙↗','N'=>'↙↓',
                'O'=>'←↖','P'=>'←↑','Q'=>'←→','R'=>'←↗','S'=>'←↓','T'=>'↖↑',
                'U'=>'↖→','V'=>'↑↓','W'=>'↗→','X'=>'↗↓','Y'=>'↖↗','Z'=>'↓→',
            ],
            'separator' => ' ',
        ],
        'braille' => [
            'name' => 'Braille',
            'icon' => '⠿',
            'description' => 'Système tactile à 6 points inventé par Louis Braille en 1824.',
            'map' => [
                'A'=>'⠁','B'=>'⠃','C'=>'⠉','D'=>'⠙','E'=>'⠑','F'=>'⠋','G'=>'⠛','H'=>'⠓','I'=>'⠊','J'=>'⠚',
                'K'=>'⠅','L'=>'⠇','M'=>'⠍','N'=>'⠝','O'=>'⠕','P'=>'⠏','Q'=>'⠟','R'=>'⠗','S'=>'⠎','T'=>'⠞',
                'U'=>'⠥','V'=>'⠧','W'=>'⠺','X'=>'⠭','Y'=>'⠽','Z'=>'⠵',
            ],
            'separator' => '',
        ],
        'navajo' => [
            'name' => 'Code Navajo',
            'icon' => '🦅',
            'description' => 'Inspiré des Code Talkers de la Seconde Guerre mondiale.',
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
                <div style="font-size:12px;opacity:0.6;text-transform:uppercase;letter-spacing:1px">Code du jour</div>
                <div style="font-size:1.3rem;font-weight:700"><?php echo esc_html($code_info['icon'] . ' ' . $code_info['name']); ?></div>
            </div>
            <div style="font-size:13px;opacity:0.6"><?php echo date_i18n('j F Y'); ?></div>
        </div>
        <div style="background:rgba(255,255,255,0.1);border-radius:10px;padding:16px;margin-bottom:12px;font-family:monospace;font-size:<?php echo ($today_code === 'braille') ? '1.4rem' : '0.95rem'; ?>;word-break:break-all;line-height:1.8;letter-spacing:<?php echo ($today_code === 'braille') ? '4px' : '1px'; ?>">
            <?php echo esc_html($encoded); ?>
        </div>
        <details style="cursor:pointer">
            <summary style="font-size:13px;opacity:0.7">💡 Indice : cliquez pour voir la réponse</summary>
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
            <h3 style="color:#007748;margin:0 0 16px">🔐 Encodeur de messages secrets</h3>
            <textarea id="scEncInput" rows="3" placeholder="Entrez votre message ici..." style="width:100%;padding:12px;border:1.5px solid #d0d0c8;border-radius:8px;font-size:14px;font-family:inherit;resize:vertical;margin-bottom:12px"></textarea>
            <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px">
                <select id="scEncCode" style="flex:1;padding:10px;border:1.5px solid #d0d0c8;border-radius:8px;font-size:14px">
                    <?php foreach ($codes as $key => $info): ?>
                    <option value="<?php echo esc_attr($key); ?>"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <div id="scEncShiftWrap" style="display:none">
                    <label style="font-size:12px;color:#6a6a62">Décalage:</label>
                    <input type="number" id="scEncShift" value="3" min="1" max="25" style="width:60px;padding:8px;border:1.5px solid #d0d0c8;border-radius:8px">
                </div>
                <button onclick="scEncode()" style="padding:10px 20px;background:#007748;color:#fff;border:none;border-radius:8px;font-weight:600;cursor:pointer;font-size:14px">Encoder →</button>
            </div>
            <div id="scEncResult" style="display:none;background:#f9f8f5;border:2px solid #e0ddd4;border-radius:10px;padding:16px;font-family:monospace;font-size:0.95rem;word-break:break-all;line-height:1.8;position:relative">
                <button onclick="scCopyResult()" style="position:absolute;top:8px;right:8px;background:#007748;color:#fff;border:none;border-radius:6px;padding:4px 10px;font-size:11px;cursor:pointer">📋 Copier</button>
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
    function scCopyResult(){
        navigator.clipboard.writeText(document.getElementById('scEncOutput').textContent);
        var btn = event.target; btn.textContent = '✅ Copié!'; setTimeout(function(){ btn.textContent = '📋 Copier'; }, 1500);
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
            <div style="font-size:11px;color:#6a6a62;margin-top:4px">↑ Décalage de 3 (modifiable dans l'encodeur)</div>
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
        'Codes scouts',
        '⚜️ Codes scouts',
        'manage_options',
        'scout-codes',
        'scout_codes_admin_page'
    );
});

function scout_codes_admin_page() {
    if (isset($_POST['scout_save_messages']) && wp_verify_nonce($_POST['_sc_nonce'], 'scout_save_messages')) {
        $messages = array_filter(array_map('sanitize_text_field', explode("\n", $_POST['messages'] ?? '')));
        update_option('scout_codes_messages', $messages);
        echo '<div class="notice notice-success"><p>Messages sauvegardés!</p></div>';
    }
    if (isset($_POST['scout_save_cotd']) && wp_verify_nonce($_POST['_sc_nonce2'], 'scout_save_cotd')) {
        update_option('scout_codes_forced_code', sanitize_key($_POST['forced_code'] ?? ''));
        echo '<div class="notice notice-success"><p>Code du jour mis à jour!</p></div>';
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
        <h1>⚜️ Codes scouts — Configuration</h1>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0">🎯 Code du jour — Forcer un code</h2>
            <p class="description">Par défaut, le code change automatiquement chaque jour. Vous pouvez forcer un code spécifique.</p>
            <form method="post">
                <?php wp_nonce_field('scout_save_cotd', '_sc_nonce2'); ?>
                <select name="forced_code" style="padding:8px;margin-right:8px">
                    <option value="" <?php selected($forced, ''); ?>>🎲 Automatique (change chaque jour)</option>
                    <?php foreach ($codes as $key => $info): ?>
                    <option value="<?php echo esc_attr($key); ?>" <?php selected($forced, $key); ?>><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" name="scout_save_cotd" class="button button-primary">Appliquer</button>
                <?php if ($forced): ?>
                <span style="margin-left:8px;color:#e67e22">⚠️ Code forcé : <?php echo esc_html($codes[$forced]['name'] ?? $forced); ?></span>
                <?php endif; ?>
            </form>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0">💬 Messages à encoder</h2>
            <p class="description">Un message par ligne. Le système choisit un message différent chaque jour pour le "Code du jour".</p>
            <form method="post">
                <?php wp_nonce_field('scout_save_messages', '_sc_nonce'); ?>
                <textarea name="messages" rows="12" style="width:100%;font-family:monospace;padding:12px;border:1px solid #d0d0c8;border-radius:8px"><?php echo esc_textarea(implode("\n", $messages)); ?></textarea>
                <div style="margin-top:8px">
                    <button type="submit" name="scout_save_messages" class="button button-primary">💾 Sauvegarder les messages</button>
                    <span style="margin-left:12px;font-size:12px;color:#6a6a62"><?php echo count($messages); ?> messages configurés</span>
                </div>
            </form>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0">📋 Shortcodes disponibles</h2>
            <table class="form-table">
                <tr><th><code>[scout_code_du_jour]</code></th><td>Affiche le code du jour avec un message encodé. Change automatiquement chaque jour.<br>Options: <code>[scout_code_du_jour code="morse"]</code> pour forcer un code, <code>[scout_code_du_jour message="Mon message"]</code> pour un message fixe.</td></tr>
                <tr><th><code>[scout_encodeur]</code></th><td>Outil interactif pour encoder des messages dans n'importe quel code scout.</td></tr>
                <tr><th><code>[scout_codes_reference]</code></th><td>Tableau de référence de tous les codes.<br>Options: <code>[scout_codes_reference code="morse"]</code> pour afficher un seul code.</td></tr>
            </table>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0">🖼️ Portraits des inventeurs</h2>
            <p class="description">Téléversez des portraits depuis votre ordinateur. Utilisez des images du domaine public (Wikimedia Commons). Les images doivent être importées dans la <a href="<?php echo admin_url('upload.php'); ?>">bibliothèque de médias</a> d'abord.</p>
            <?php if (isset($_POST['scout_save_portraits']) && wp_verify_nonce($_POST['_sc_portraits'], 'scout_save_portraits')) {
                foreach (scout_codes_get_all_pages() as $slug => $info) {
                    $url = sanitize_url($_POST['portrait_' . $slug] ?? '');
                    update_option('scout_codes_portrait_' . $slug, $url);
                }
                echo '<div class="notice notice-success"><p>Portraits sauvegardés!</p></div>';
            } ?>
            <form method="post">
            <?php wp_nonce_field('scout_save_portraits', '_sc_portraits'); ?>
            <table class="widefat" style="max-width:700px">
                <thead><tr><th>Code</th><th>URL de l'image (depuis la bibliothèque de médias)</th><th style="width:60px">Aperçu</th></tr></thead>
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
            <p style="margin-top:8px"><button type="submit" name="scout_save_portraits" class="button button-primary">💾 Sauvegarder les portraits</button></p>
            <p class="description" style="margin-top:8px">💡 <strong>Comment faire :</strong> 1) Téléchargez une image de Wikimedia Commons sur votre ordinateur. 2) Importez-la dans <a href="<?php echo admin_url('media-new.php'); ?>">Médias → Ajouter</a>. 3) Copiez l'URL de l'image et collez-la ici.</p>
            </form>
        </div>

            <h2 style="margin-top:0">🧪 Aperçu — Code du jour</h2>
            <?php echo do_shortcode('[scout_code_du_jour]'); ?>
        </div>

        <div class="postbox" style="padding:20px;margin-top:20px">
            <h2 style="margin-top:0">📄 Pages générées</h2>
            <?php if (isset($_GET['recreated'])): ?>
                <div class="notice notice-success"><p>Pages recréées! Visitez la page d'accueil pour déclencher la création.</p></div>
            <?php endif; ?>
            <p class="description">Le plugin crée automatiquement une page par code scout. Si les pages ont été supprimées, vous pouvez les recréer.</p>
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
                        <li style="color:#c0392b"><?php echo esc_html($info['icon'] . ' ' . $info['name']); ?> — ⚠️ page manquante</li>
                    <?php endif; endforeach; ?>
                </ul>
            <?php else: ?>
                <p style="color:#e67e22">⚠️ Pages non encore créées. Elles seront créées automatiquement au prochain chargement d'une page admin.</p>
            <?php endif; ?>
            <form method="post" action="<?php echo admin_url('admin-post.php'); ?>" style="margin-top:12px">
                <?php wp_nonce_field('scout_recreate_pages'); ?>
                <input type="hidden" name="action" value="scout_recreate_code_pages">
                <button type="submit" class="button" onclick="return confirm('Supprimer et recréer toutes les pages de codes?')">🔄 Recréer toutes les pages</button>
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
        'morse' => ['name' => 'Code Morse', 'icon' => '📡', 'file' => 'code-morse.php',
            'description' => 'Points et tirets — le langage universel des scouts. Avec audio!'],
        'braille' => ['name' => 'Braille', 'icon' => '⠿', 'file' => 'code-braille.php',
            'description' => 'Système tactile à 6 points inventé par Louis Braille en 1824.'],
        'tictactoc' => ['name' => 'Tic-Tac-Toc (Pigpen)', 'icon' => '✏️', 'file' => 'code-tictactoc.php',
            'description' => 'Code géométrique caché dans une grille de morpion.'],
        'semaphore' => ['name' => 'Sémaphore, Grec & Runes', 'icon' => '🚩', 'file' => 'code-grec-rune-semaphore.php',
            'description' => 'Drapeaux, alphabet grec et runes nordiques.'],
        'substitution' => ['name' => 'César & substitution', 'icon' => '🏛️', 'file' => 'code-substitution.php',
            'description' => 'Décalage de l\'alphabet et substitutions personnalisées.'],
        'ascii' => ['name' => 'Code binaire (ASCII)', 'icon' => '💻', 'file' => 'code-ascii.php',
            'description' => 'Chaque lettre en bits — le langage des ordinateurs.'],
        'telephone' => ['name' => 'Code téléphone', 'icon' => '📱', 'file' => 'code-telephone.php',
            'description' => 'Les lettres cachées dans le clavier du téléphone.'],
        'samourais' => ['name' => 'Code des Samouraïs', 'icon' => '⚔️', 'file' => 'code-samourais.php',
            'description' => 'Un code inspiré des guerriers japonais.'],
        'chinois' => ['name' => 'Code chinois', 'icon' => '🀄', 'file' => 'code-chinois.php',
            'description' => 'Un code basé sur les traits des caractères chinois.'],
        'musique' => ['name' => 'Code musical', 'icon' => '🎵', 'file' => 'code-musique.php',
            'description' => 'Les notes de musique cachent des messages.'],
        'cle' => ['name' => 'Code à clé', 'icon' => '🔑', 'file' => 'code-cle.php',
            'description' => 'Un code qui utilise un mot-clé secret pour encoder.'],
        'inverse-avocat' => ['name' => 'Code inversé & avocat', 'icon' => '🔄', 'file' => 'code-inverse-avocat.php',
            'description' => 'Miroir, inversions et codes d\'avocat.'],
        'deux-grilles' => ['name' => 'Code des deux grilles', 'icon' => '🔲', 'file' => 'code-deux-grilles.php',
            'description' => 'Deux grilles superposées pour un chiffrement visuel.'],
        'solaire' => ['name' => 'Code solaire', 'icon' => '☀️', 'file' => 'code-solair.php',
            'description' => 'Un code inspiré des cadrans solaires.'],
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
    if (!current_user_can('manage_options')) wp_die('Accès refusé');
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
            <h2 style="font-size:2.2rem;margin-bottom:8px">🔐 Codes & signes scouts</h2>
            <p style="opacity:0.7;font-size:0.95rem">Apprends les codes secrets utilisés par les scouts du monde entier!</p>
        </div>

        <div style="max-width:800px;margin:0 auto;padding:24px 20px">

        <?php echo do_shortcode('[scout_code_du_jour]'); ?>

        <h3 style="color:#007748;margin:32px 0 16px;font-size:1.1rem">📚 Tous les codes</h3>
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

        <h3 style="color:#007748;margin:0 0 16px;font-size:1.1rem">🔐 Encodeur</h3>
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
    if (!isset($all_pages[$slug])) return '<p>Code inconnu.</p>';
    $info = $all_pages[$slug];

    // Check if we have a rich content file
    $file = SCOUT_CODES_DIR . 'pages/' . $info['file'];
    if (!file_exists($file)) return '<p>Fichier de contenu introuvable.</p>';

    ob_start(); ?>
    <div>
        <!-- Header (full width) -->
        <div style="background:linear-gradient(135deg,#003320,#007748);padding:40px 24px;color:#fff;position:relative;overflow:hidden">
            <div style="position:absolute;top:0;right:40px;font-size:10rem;opacity:0.06;line-height:1"><?php echo esc_html($info['icon']); ?></div>
            <div style="max-width:800px;margin:0 auto;position:relative">
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('codes-scouts'))); ?>" style="color:rgba(255,255,255,0.6);text-decoration:none;font-size:13px">← Tous les codes</a>
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
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('codes-scouts'))); ?>" style="display:inline-block;padding:10px 24px;background:#007748;color:#fff;border-radius:8px;text-decoration:none;font-weight:600">← Tous les codes</a>
        </div>
    </div>
    <?php return ob_get_clean();
});
