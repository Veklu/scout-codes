<style scoped>
:root {
  --g:#007748; --gd:#005a36; --gl:#00a86b; --gold:#d4a017;
  --red:#c0392b; --cream:#faf8f0; --bg:#f0efe8; --card:#fff;
  --txt:#1a1a16; --soft:#3a3a36; --muted:#6a6a62; --bdr:#d8d5cc;
}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}

/* Header */
.hero{background:linear-gradient(160deg,#002a1a 0%,var(--gd) 40%,var(--g) 100%);padding:48px 24px 40px;text-align:center;position:relative;overflow:hidden}
.hero::before{content:'·  — — ·  ·—  ·—·  ·  ···  ·—·  ·  ——  ·—  ·—·  ·—  —··  ·  ···';position:absolute;top:12px;left:50%;transform:translateX(-50%);font-family:'JetBrains Mono';font-size:11px;color:rgba(212,160,23,0.25);white-space:nowrap;letter-spacing:3px}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff;line-height:1.1}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.7);margin-top:8px;font-size:1rem}
.hero .page-ref{display:inline-block;background:rgba(255,255,255,0.1);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}

.container{max-width:880px;margin:0 auto;padding:24px 16px}

/* Encoder box */
.encoder{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.encoder h2{font-family:'Bitter',serif;color:var(--g);font-size:1.5rem;margin-bottom:16px;display:flex;align-items:center;gap:10px}
.encoder h2 .icon{width:36px;height:36px;background:var(--g);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:18px}

.input-row{display:flex;gap:12px;margin-bottom:16px;flex-wrap:wrap}
.input-row textarea{flex:1;min-width:200px;padding:14px 16px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito',sans-serif;font-size:16px;resize:vertical;min-height:60px;transition:border-color 0.2s}
.input-row textarea:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}

.btn{padding:12px 24px;border:none;border-radius:10px;font-family:'Nunito',sans-serif;font-weight:700;font-size:14px;cursor:pointer;transition:all 0.2s}
.btn-primary{background:var(--g);color:#fff}
.btn-primary:hover{background:var(--gd);transform:translateY(-1px);box-shadow:0 4px 12px rgba(0,119,72,0.3)}
.btn-gold{background:var(--gold);color:#fff}
.btn-gold:hover{background:#b8890f}
.btn-outline{background:none;border:2px solid var(--bdr);color:var(--soft)}
.btn-outline:hover{border-color:var(--g);color:var(--g)}
.btn-group{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}

.output-box{background:#0a1f14;border-radius:12px;padding:20px 24px;min-height:80px;font-family:'JetBrains Mono',monospace;font-size:18px;color:var(--gl);letter-spacing:3px;line-height:2;word-break:break-all;position:relative;overflow:hidden}
.output-box::before{content:'OUTPUT';position:absolute;top:6px;right:12px;font-size:9px;color:rgba(0,168,107,0.3);letter-spacing:2px}
.output-box .cursor{display:inline-block;width:2px;height:20px;background:var(--gl);animation:blink 1s infinite;vertical-align:text-bottom;margin-left:2px}
@keyframes blink{0%,50%{opacity:1}51%,100%{opacity:0}}

.output-label{font-size:12px;color:var(--muted);margin-bottom:6px;font-weight:600;text-transform:uppercase;letter-spacing:1px}

/* Direction toggle */
.direction-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:20px;border:1px solid var(--bdr)}
.direction-toggle button{flex:1;padding:10px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:13px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.direction-toggle button.active{background:var(--g);color:#fff;box-shadow:0 2px 8px rgba(0,119,72,0.2)}

/* Reference chart */
.chart{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.chart h2{font-family:'Bitter',serif;color:var(--g);font-size:1.5rem;margin-bottom:6px}
.chart .subtitle{color:var(--muted);font-size:0.9rem;margin-bottom:20px}

.alpha-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(95px,1fr));gap:8px}
.alpha-card{background:var(--cream);border:1.5px solid var(--bdr);border-radius:10px;padding:10px 6px;text-align:center;cursor:pointer;transition:all 0.15s;position:relative}
.alpha-card:hover{border-color:var(--g);transform:translateY(-2px);box-shadow:0 6px 16px rgba(0,119,72,0.1)}
.alpha-card:active{transform:scale(0.97)}
.alpha-card .ltr{font-family:'Bitter',serif;font-size:26px;font-weight:900;color:var(--g);line-height:1}
.alpha-card .morse{font-family:'JetBrains Mono';font-size:16px;color:var(--soft);margin-top:4px;letter-spacing:3px;min-height:22px}
.alpha-card .word{font-size:10px;color:var(--muted);margin-top:2px;font-style:italic}

/* Numbers section */
.num-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(90px,1fr));gap:8px;margin-top:16px}

/* Mnemonic section */
.mnemonic{background:linear-gradient(135deg,#f0faf4,var(--cream));border:1px solid #b8e6cc;border-radius:12px;padding:20px;margin-bottom:24px}
.mnemonic h3{color:var(--gd);font-size:1rem;margin-bottom:8px}
.mnemonic p{font-size:0.9rem;color:var(--soft);line-height:1.7}
.mnemonic .tip{display:inline-block;background:var(--g);color:#fff;font-size:11px;font-weight:700;padding:2px 8px;border-radius:4px;margin-right:6px}

/* Sound visual */
.sound-bar{display:flex;gap:3px;align-items:end;height:24px;margin-top:8px}
.sound-bar .bar{width:4px;background:var(--gl);border-radius:2px;transition:height 0.1s}

/* Footer */
.footer{background:var(--gd);padding:24px;text-align:center;color:rgba(255,255,255,0.5);font-size:12px;margin-top:40px}
.footer span{color:var(--gold)}

@media(max-width:600px){
  .hero h1{font-size:1.8rem}
  .alpha-grid{grid-template-columns:repeat(auto-fill,minmax(75px,1fr))}
  .encoder{padding:20px}
  .output-box{font-size:14px;letter-spacing:2px}
}
</style>
</div>

<div class="container">

<!-- MNEMONIC TIP -->
<div class="mnemonic">
  <h3>💡 <?php esc_html_e('Truc pour mémoriser', 'scout-codes'); ?></h3>
  <p><?php esc_html_e('Chaque lettre a un mot-clé. Dans ce mot, chaque', 'scout-codes'); ?> <span class="tip"><?php esc_html_e('voyelle = point ·', 'scout-codes'); ?></span> <?php esc_html_e('et chaque', 'scout-codes'); ?> <span class="tip"><?php esc_html_e('consonne = trait —', 'scout-codes'); ?></span>.<br>
  <?php esc_html_e('Exemple: A = « as » → voyelle + consonne →', 'scout-codes'); ?> <strong>· —</strong><br>
  <?php esc_html_e('C = « coco » → consonne voyelle consonne voyelle →', 'scout-codes'); ?> <strong>— · — ·</strong></p>
</div>

<!-- ENCODER / DECODER -->
<div class="encoder">
  <h2><span class="icon">⚡</span> <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>

  <div class="direction-toggle">
    <button class="active" onclick="setDirection('encode',this)"><?php esc_html_e('Texte → Morse', 'scout-codes'); ?></button>
    <button onclick="setDirection('decode',this)"><?php esc_html_e('Morse → Texte', 'scout-codes'); ?></button>
  </div>

  <div class="input-row">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="convert()"></textarea>
  </div>

  <div class="btn-group">
    <button class="btn btn-primary" onclick="convert()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
    <button class="btn btn-gold" onclick="playMorse()">🔊 <?php esc_html_e('Écouter', 'scout-codes'); ?></button>
    <button class="btn btn-outline" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-outline" onclick="copyOutput()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
  </div>

  <div class="output-label" id="outputLabel"><?php esc_html_e('MORSE', 'scout-codes'); ?></div>
  <div class="output-box" id="output"><span class="cursor"></span></div>

  <div class="sound-bar" id="soundBar"></div>
</div>

<!-- ALPHABET CHART -->
<div class="chart">
  <h2><?php esc_html_e('Alphabet Morse complet', 'scout-codes'); ?></h2>
  <p class="subtitle"><?php esc_html_e('Cliquez sur une lettre pour l\'ajouter à votre message', 'scout-codes'); ?></p>

  <div class="alpha-grid" id="alphaGrid"></div>

  <h3 style="color:var(--g);margin-top:24px;font-family:'Bitter',serif"><?php esc_html_e('Chiffres', 'scout-codes'); ?></h3>
  <div class="num-grid" id="numGrid"></div>
</div>

</div>



<script>var scL10n = <?php echo wp_json_encode([
  'tapezMessage' => __('Tapez votre message ici...', 'scout-codes'),
  'collezMorse' => __('Collez du morse ici (séparez les lettres par des espaces, les mots par /)...', 'scout-codes'),
  'morse' => __('MORSE', 'scout-codes'),
  'texte' => __('TEXTE', 'scout-codes'),
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
]); ?>;</script>
<script>
const MORSE = {
  'A':'·—','B':'—···','C':'—·—·','D':'—··','E':'·','F':'··—·',
  'G':'——·','H':'····','I':'··','J':'·———','K':'—·—','L':'·—··',
  'M':'——','N':'—·','O':'———','P':'·——·','Q':'——·—','R':'·—·',
  'S':'···','T':'—','U':'··—','V':'···—','W':'·——','X':'—··—',
  'Y':'—·——','Z':'——··',
  '1':'·————','2':'··———','3':'···——','4':'····—','5':'·····',
  '6':'—····','7':'——···','8':'———··','9':'————·','0':'—————'
};

const WORDS = {
  'A':'as','B':'beau','C':'coco','D':'duo','E':'é','F':'aide',
  'G':'glu','H':'haha','I':'if','J':'arts','K':'kim','L':'élie',
  'M':'mm','N':'nu','O':'oh','P':'apte','Q':'flic','R':'ère',
  'S':'isi','T':'t','U':'ouf','V':'oeuf','W':'ivr','X':'deux',
  'Y':'lynx','Z':'zzoo'
};

const REVERSE = {};
for (const [k,v] of Object.entries(MORSE)) REVERSE[v] = k;

let direction = 'encode';

function setDirection(dir, btn) {
  direction = dir;
  document.querySelectorAll('.direction-toggle button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('inputText').placeholder = dir === 'encode'
    ? scL10n.tapezMessage
    : scL10n.collezMorse;
  document.getElementById('outputLabel').textContent = dir === 'encode' ? scL10n.morse : scL10n.texte;
  convert();
}

function convert() {
  const input = document.getElementById('inputText').value;
  const output = document.getElementById('output');
  if (!input.trim()) { output.innerHTML = '<span class="cursor"></span>'; return; }

  let result;
  if (direction === 'encode') {
    result = input.toUpperCase().split('').map(ch => {
      if (ch === ' ') return '/';
      return MORSE[ch] || '';
    }).filter(Boolean).join('  ');
  } else {
    result = input.split(' / ').map(word =>
      word.trim().split(/\s{1,}/).map(code => REVERSE[code] || '?').join('')
    ).join(' ');
  }

  output.textContent = result;
}

function clearAll() {
  document.getElementById('inputText').value = '';
  document.getElementById('output').innerHTML = '<span class="cursor"></span>';
}

function copyOutput() {
  const text = document.getElementById('output').textContent;
  navigator.clipboard.writeText(text).then(() => {
    const btn = event.target;
    btn.textContent = '✅ ' + scL10n.copie;
    setTimeout(() => btn.textContent = '📋 ' + scL10n.copier, 1500);
  });
}

// Audio
const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
const DOT_DUR = 0.08;
const DASH_DUR = DOT_DUR * 3;
const GAP = DOT_DUR;
const LETTER_GAP = DOT_DUR * 3;
const WORD_GAP = DOT_DUR * 7;
const FREQ = 660;

function playMorse() {
  const input = document.getElementById('inputText').value;
  const morseStr = direction === 'encode'
    ? input.toUpperCase().split('').map(ch => ch === ' ' ? '/' : MORSE[ch] || '').filter(Boolean).join(' ')
    : input;

  let time = audioCtx.currentTime + 0.05;
  const bar = document.getElementById('soundBar');
  bar.innerHTML = '';

  for (const part of morseStr) {
    if (part === '·') {
      playTone(time, DOT_DUR);
      time += DOT_DUR + GAP;
    } else if (part === '—') {
      playTone(time, DASH_DUR);
      time += DASH_DUR + GAP;
    } else if (part === '/') {
      time += WORD_GAP;
    } else if (part === ' ') {
      time += LETTER_GAP;
    }
  }
}

function playTone(startTime, duration) {
  const osc = audioCtx.createOscillator();
  const gain = audioCtx.createGain();
  osc.connect(gain);
  gain.connect(audioCtx.destination);
  osc.frequency.value = FREQ;
  osc.type = 'sine';
  gain.gain.setValueAtTime(0.3, startTime);
  gain.gain.exponentialRampToValueAtTime(0.001, startTime + duration);
  osc.start(startTime);
  osc.stop(startTime + duration + 0.01);
}

// Build alphabet grid
function buildGrid() {
  const grid = document.getElementById('alphaGrid');
  for (let i = 65; i <= 90; i++) {
    const ch = String.fromCharCode(i);
    const card = document.createElement('div');
    card.className = 'alpha-card';
    card.innerHTML = `<div class="ltr">${ch}</div><div class="morse">${MORSE[ch]}</div><div class="word">${WORDS[ch] || ''}</div>`;
    card.onclick = () => {
      const ta = document.getElementById('inputText');
      if (direction === 'encode') {
        ta.value += ch;
      } else {
        ta.value += (ta.value && !ta.value.endsWith(' ') ? '  ' : '') + MORSE[ch];
      }
      convert();
    };
    grid.appendChild(card);
  }

  const numGrid = document.getElementById('numGrid');
  for (let i = 1; i <= 10; i++) {
    const n = i % 10;
    const ch = String(n);
    const card = document.createElement('div');
    card.className = 'alpha-card';
    card.innerHTML = `<div class="ltr">${ch}</div><div class="morse" style="font-size:13px">${MORSE[ch]}</div>`;
    card.onclick = () => {
      const ta = document.getElementById('inputText');
      if (direction === 'encode') {
        ta.value += ch;
      } else {
        ta.value += (ta.value && !ta.value.endsWith(' ') ? '  ' : '') + MORSE[ch];
      }
      convert();
    };
    numGrid.appendChild(card);
  }
}

buildGrid();
</script>