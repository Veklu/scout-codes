<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a1a1a,#2a2a2a,#3a3a3a);padding:48px 24px 40px;text-align:center;position:relative}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff;position:relative}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px;position:relative}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}
.container{max-width:900px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:6px;display:flex;align-items:center;gap:10px}
.card h2 .icon{width:34px;height:34px;background:var(--g);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

/* ══ PHONE ══ */
.phone-wrap{background:#1a1a1a;border-radius:28px;padding:32px 24px;max-width:320px;margin:0 auto 24px;box-shadow:0 8px 32px rgba(0,0,0,0.3),inset 0 1px 0 rgba(255,255,255,0.05);border:2px solid #444}
.phone-screen{background:#111;border-radius:12px;padding:16px;margin-bottom:20px;min-height:60px;font-family:'JetBrains Mono';font-size:20px;color:#6f6;letter-spacing:3px;text-align:center;border:1px solid #333;word-break:break-all}
.phone-screen .sub{font-size:12px;color:#555;letter-spacing:1px;margin-top:4px;font-weight:400}

.keypad{display:grid;grid-template-columns:repeat(3,1fr);gap:8px}
.key{background:linear-gradient(180deg,#444,#333);border:1px solid #555;border-radius:14px;padding:12px 8px;text-align:center;cursor:pointer;transition:all 0.1s;position:relative;user-select:none}
.key:active{background:linear-gradient(180deg,#555,#444);transform:scale(0.96)}
.key:hover{border-color:var(--gold)}
.key .num{font-family:'Bitter',serif;font-size:28px;font-weight:900;color:#fff;line-height:1}
.key .chars{font-size:11px;color:#999;letter-spacing:3px;margin-top:2px;font-family:'JetBrains Mono'}
.key.empty{background:#222;border-color:#333;cursor:default}
.key.empty:active{transform:none}

/* Letter badges on keys */
.key .letter-dots{display:flex;gap:4px;justify-content:center;margin-top:6px}
.key .ldot{width:20px;height:20px;border-radius:50%;background:rgba(0,119,72,0.2);border:1px solid rgba(0,119,72,0.4);display:flex;align-items:center;justify-content:center;font-size:9px;font-weight:700;color:var(--gold);font-family:'JetBrains Mono';cursor:pointer;transition:0.15s}
.key .ldot:hover{background:var(--g);color:#fff;transform:scale(1.15)}

/* Direction */
.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.dir-toggle button{flex:1;padding:8px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:12px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:#333;color:#fff}

.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-box{background:#111;border-radius:12px;padding:20px 24px;min-height:60px;font-family:'JetBrains Mono';font-size:18px;color:#6f6;letter-spacing:3px;line-height:2;word-break:break-all}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}

.example{background:var(--cream);border:1px solid var(--bdr);border-radius:12px;padding:20px;margin-top:20px}
.example strong{color:var(--g)}

@media(max-width:600px){.hero h1{font-size:1.8rem}.phone-wrap{max-width:280px;padding:24px 16px}.key .num{font-size:22px}}
</style>
</div>

<div class="container">

<div class="card">
  <h2><span class="icon">📱</span> <?php esc_html_e('Le principe', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Ce code se retrouve sur tout téléphone. Chaque touche porte 3 lettres. Pour coder une lettre, on écrit le <strong>numéro de la touche</strong> avec la <strong>position de la lettre en exposant</strong>. Exemple : C est la 3e lettre de la touche 2, donc C = 2<sup>3</sup>.', 'scout-codes'), ['strong' => [], 'sup' => []]); ?></p>

  <!-- PHONE -->
  <div class="phone-wrap">
    <div class="phone-screen" id="phoneScreen"><span style="color:#555"><?php esc_html_e('Appuyez sur une lettre...', 'scout-codes'); ?></span></div>
    <div class="keypad" id="keypad"></div>
  </div>

  <div class="example">
    <strong><?php esc_html_e('Exemple : CAMP = 2³ 2¹ 6¹ 7¹', 'scout-codes'); ?></strong><br><br>
    <?php esc_html_e('C = touche 2, 3e lettre → 2³', 'scout-codes'); ?><br>
    <?php esc_html_e('A = touche 2, 1re lettre → 2¹', 'scout-codes'); ?><br>
    <?php esc_html_e('M = touche 6, 1re lettre → 6¹', 'scout-codes'); ?><br>
    <?php esc_html_e('P = touche 7, 1re lettre → 7¹', 'scout-codes'); ?><br><br>
    <strong><?php esc_html_e('Autre exemple : 3¹=D, 3²=E, 3³=F', 'scout-codes'); ?></strong>
  </div>
</div>

<!-- ENCODER -->
<div class="card">
  <h2><span class="icon">⚡</span> <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>

  <div class="dir-toggle">
    <button class="active" onclick="setDir('encode',this)"><?php esc_html_e('Texte → Code téléphone', 'scout-codes'); ?></button>
    <button onclick="setDir('decode',this)"><?php esc_html_e('Code → Texte', 'scout-codes'); ?></button>
  </div>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="convert()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-g" onclick="convert()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="copyOutput()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
  </div>

  <div class="output-label" id="outLabel"><?php esc_html_e('CODE TÉLÉPHONE', 'scout-codes'); ?></div>
  <div class="output-box" id="output"></div>
</div>
</div>



<script>var scL10n = <?php echo wp_json_encode([
  'tapezMessage' => __('Tapez votre message ici...', 'scout-codes'),
  'entrezCode' => __('Entrez le code (ex: 2³ 2¹ 6¹ 7¹ ou 23 21 61 71)...', 'scout-codes'),
  'codeTelephone' => __('CODE TÉLÉPHONE', 'scout-codes'),
  'texte' => __('TEXTE', 'scout-codes'),
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
  'touche' => __('touche', 'scout-codes'),
  'position' => __('position', 'scout-codes'),
]); ?>;</script>
<script>
// Phone keypad layout (matching the book: no Q on 7, no Z on 9)
const KEYS = [
  {num:'1', chars:''},
  {num:'2', chars:'ABC'},
  {num:'3', chars:'DEF'},
  {num:'4', chars:'GHI'},
  {num:'5', chars:'JKL'},
  {num:'6', chars:'MNO'},
  {num:'7', chars:'PRS'},
  {num:'8', chars:'TUV'},
  {num:'9', chars:'WXY'},
  {num:'*', chars:''},
  {num:'0', chars:''},
  {num:'#', chars:''},
];

// Build letter→code lookup
const ENCODE_MAP = {};  // letter -> "2³"
const DECODE_MAP = {};  // "23" -> letter (key+position)

KEYS.forEach(k => {
  for (let i = 0; i < k.chars.length; i++) {
    const letter = k.chars[i];
    const pos = i + 1;
    ENCODE_MAP[letter] = {key: k.num, pos};
    DECODE_MAP[k.num + String(pos)] = letter;
  }
});

let dir = 'encode';

function setDir(d, btn) {
  dir = d;
  document.querySelectorAll('.dir-toggle button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('inputText').placeholder = d === 'encode'
    ? scL10n.tapezMessage
    : scL10n.entrezCode;
  document.getElementById('outLabel').textContent = d === 'encode' ? scL10n.codeTelephone : scL10n.texte;
  convert();
}

function toSuperscript(n) {
  const sup = '⁰¹²³⁴⁵⁶⁷⁸⁹';
  return String(n).split('').map(d => sup[parseInt(d)]).join('');
}

function convert() {
  const input = document.getElementById('inputText').value;
  const out = document.getElementById('output');
  if (!input.trim()) { out.textContent = ''; return; }

  if (dir === 'encode') {
    const result = input.toUpperCase().split('').map(ch => {
      if (ch === ' ') return ' ';
      const info = ENCODE_MAP[ch];
      if (!info) return '';
      return info.key + toSuperscript(info.pos);
    }).filter(x => x !== '').join(' ');
    out.textContent = result;
  } else {
    // Decode: parse "2³ 2¹ 6¹" or "23 21 61" format
    const clean = input
      .replace(/⁰/g,'0').replace(/¹/g,'1').replace(/²/g,'2').replace(/³/g,'3')
      .replace(/⁴/g,'4').replace(/⁵/g,'5').replace(/⁶/g,'6').replace(/⁷/g,'7')
      .replace(/⁸/g,'8').replace(/⁹/g,'9')
      .replace(/\^/g,'');
    const result = clean.trim().split(/[\s,·]+/).map(code => {
      // code should be like "23" meaning key 2, position 3
      if (code.length >= 2) {
        const key = code[0];
        const pos = code[code.length - 1];
        return DECODE_MAP[key + pos] || '?';
      }
      return '?';
    }).join('');
    out.textContent = result;
  }
}

function clearAll() { document.getElementById('inputText').value = ''; document.getElementById('output').textContent = ''; }
function copyOutput() {
  navigator.clipboard.writeText(document.getElementById('output').textContent).then(() => {
    event.target.textContent = '✅ ' + scL10n.copie;
    setTimeout(() => event.target.textContent = '📋 ' + scL10n.copier, 1500);
  });
}

// Build keypad
function buildKeypad() {
  const pad = document.getElementById('keypad');
  KEYS.forEach(k => {
    const key = document.createElement('div');
    key.className = 'key' + (k.chars === '' && k.num !== '0' ? ' empty' : '');
    let html = `<div class="num">${k.num}</div>`;
    if (k.chars) {
      html += `<div class="chars">${k.chars.split('').join(' ')}</div>`;
      html += '<div class="letter-dots">';
      k.chars.split('').forEach((ch, i) => {
        html += `<div class="ldot" onclick="event.stopPropagation();addLetter('${ch}')" title="${ch} = ${k.num}${toSuperscript(i+1)}">${ch}</div>`;
      });
      html += '</div>';
    }
    key.innerHTML = html;
    pad.appendChild(key);
  });
}

function addLetter(ch) {
  const ta = document.getElementById('inputText');
  const info = ENCODE_MAP[ch];
  if (dir === 'encode') {
    ta.value += ch;
  } else {
    ta.value += (ta.value && !ta.value.endsWith(' ') ? ' ' : '') + info.key + info.pos;
  }
  convert();
  // Show on phone screen
  const screen = document.getElementById('phoneScreen');
  screen.innerHTML = `<span style="color:#6f6">${ch} = ${info.key}<sup>${info.pos}</sup></span><div class="sub">${scL10n.touche} ${info.key}, ${scL10n.position} ${info.pos}</div>`;
}

buildKeypad();
</script>