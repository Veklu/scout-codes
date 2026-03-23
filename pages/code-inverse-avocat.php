<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--purple:#6c3483;--purpled:#4a235a;--teal:#148f77}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a0a2e,#2d1b4e,#4a2c7a);padding:48px 24px 40px;text-align:center;position:relative}
.hero h1{font-family:'Bitter',serif;font-size:2.4rem;color:#fff;position:relative}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px;position:relative}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;font-size:1.4rem;margin-bottom:6px;display:flex;align-items:center;gap:10px}
.card h2 .icon{width:34px;height:34px;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

/* Table */
.cipher-table{display:grid;grid-template-columns:repeat(auto-fill,minmax(48px,1fr));gap:3px;margin:16px 0}
.cipher-cell{background:var(--cream);border:1px solid var(--bdr);border-radius:6px;padding:6px 2px;text-align:center;cursor:pointer;transition:0.15s}
.cipher-cell:hover{transform:translateY(-2px);box-shadow:0 3px 8px rgba(0,0,0,0.1)}
.cipher-cell .from{font-family:'Bitter',serif;font-size:16px;font-weight:900;line-height:1}
.cipher-cell .arrow{font-size:8px;color:var(--muted);margin:1px 0}
.cipher-cell .to{font-family:'JetBrains Mono';font-size:14px;font-weight:700;line-height:1}
.cipher-cell.inv .from{color:var(--purple)}
.cipher-cell.inv .to{color:var(--teal)}
.cipher-cell.inv:hover{border-color:var(--purple)}
.cipher-cell.avo .from{color:var(--teal)}
.cipher-cell.avo .to{color:#c0392b}
.cipher-cell.avo:hover{border-color:var(--teal)}

/* Section markers */
.section-label{display:flex;align-items:center;gap:12px;margin:28px 0 12px}
.section-label h3{font-family:'Bitter',serif;font-size:1.2rem}
.section-label .line{flex:1;height:2px;border-radius:1px}

/* Encoder */
.code-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.code-toggle button{flex:1;padding:10px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:13px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.code-toggle button.active-inv{background:var(--purple);color:#fff}
.code-toggle button.active-avo{background:var(--teal);color:#fff}

.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:12px;border:1px solid var(--bdr)}
.dir-toggle button{flex:1;padding:8px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:12px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:#333;color:#fff}

.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--purple);box-shadow:0 0 0 3px rgba(108,52,131,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-p{background:var(--purple);color:#fff}.btn-p:hover{background:var(--purpled)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--purple);color:var(--purple)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-box{background:#1a0a2e;border-radius:12px;padding:20px 24px;min-height:60px;font-family:'JetBrains Mono';font-size:22px;letter-spacing:4px;line-height:2;word-break:break-all}
.output-box.inv{color:#1abc9c}
.output-box.avo{color:#e74c3c}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}

.tip{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:14px 16px;margin-top:16px;font-size:0.9rem;color:var(--soft)}
.tip strong{color:var(--purple)}

@media(max-width:600px){.hero h1{font-size:1.6rem}.cipher-table{grid-template-columns:repeat(auto-fill,minmax(40px,1fr))}}
</style>
</div>

<div class="container">

<!-- ═══ ALPHABET INVERSÉ ═══ -->
<div class="card">
  <div class="section-label">
    <h3 style="color:var(--purple)">🔄 <?php esc_html_e('L\'Alphabet Inversé', 'scout-codes'); ?></h3>
    <div class="line" style="background:linear-gradient(90deg,var(--purple),transparent)"></div>
  </div>
  <p class="desc"><?php echo wp_kses(__('On inverse simplement l\'alphabet : A↔Z, B↔Y, C↔X, etc. Les lettres du milieu (M↔N) sont proches l\'une de l\'autre. Ce code est <strong>symétrique</strong> — encoder et décoder utilisent la même table!', 'scout-codes'), ['strong' => []]); ?></p>

  <div class="cipher-table" id="invTable"></div>

  <div class="tip">
    <strong>💡 <?php esc_html_e('Astuce :', 'scout-codes'); ?></strong> <?php esc_html_e('Ce code est son propre inverse! Si vous encodez « BONJOUR » vous obtenez « YLMQLFI ». Si vous encodez « YLMQLFI » vous retrouvez « BONJOUR ». Pas besoin de décoder différemment!', 'scout-codes'); ?>
  </div>
</div>

<!-- ═══ CODE DE L'AVOCAT ═══ -->
<div class="card">
  <div class="section-label">
    <h3 style="color:var(--teal)">⚖️ <?php esc_html_e('Le Code de l\'Avocat', 'scout-codes'); ?></h3>
    <div class="line" style="background:linear-gradient(90deg,var(--teal),transparent)"></div>
  </div>
  <p class="desc"><?php echo wp_kses(__('Ce code tire son nom du fait que la lettre « A » vaut « K ». Chaque lettre est décalée de <strong>+10 positions</strong> dans l\'alphabet (avec retour au début après Z).', 'scout-codes'), ['strong' => []]); ?></p>

  <div class="cipher-table" id="avoTable"></div>

  <div class="tip">
    <strong>💡 <?php esc_html_e('Astuce :', 'scout-codes'); ?></strong> <?php esc_html_e('Pour décoder, il faut décaler de −10 (ou +16, ce qui revient au même). Ce code n\'est PAS symétrique contrairement à l\'Alphabet Inversé.', 'scout-codes'); ?>
  </div>
</div>

<!-- ═══ ENCODER ═══ -->
<div class="card">
  <h2 style="color:var(--purple)"><span class="icon" style="background:var(--purple)">⚡</span> <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>

  <div class="code-toggle" id="codeToggle">
    <button class="active-inv" onclick="setCode('inv',this)">🔄 <?php esc_html_e('Alphabet Inversé', 'scout-codes'); ?></button>
    <button onclick="setCode('avo',this)">⚖️ <?php esc_html_e('Code de l\'Avocat', 'scout-codes'); ?></button>
  </div>

  <div class="dir-toggle">
    <button class="active" onclick="setDir('encode',this)"><?php esc_html_e('Encoder', 'scout-codes'); ?></button>
    <button onclick="setDir('decode',this)"><?php esc_html_e('Décoder', 'scout-codes'); ?></button>
  </div>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="convert()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-p" onclick="convert()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="copyOutput()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
  </div>

  <div class="output-label" id="outLabel"><?php esc_html_e('MESSAGE CODÉ', 'scout-codes'); ?></div>
  <div class="output-box inv" id="output"></div>
</div>
</div>



<script>var scL10n = <?php echo wp_json_encode([
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
]); ?>;</script>
<script>
const ALPHA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

// Inversé: A↔Z, B↔Y, etc.
const INV = {};
for (let i = 0; i < 26; i++) INV[ALPHA[i]] = ALPHA[25 - i];

// Avocat: shift +10
const AVO_ENC = {}, AVO_DEC = {};
for (let i = 0; i < 26; i++) {
  AVO_ENC[ALPHA[i]] = ALPHA[(i + 10) % 26];
  AVO_DEC[ALPHA[(i + 10) % 26]] = ALPHA[i];
}

let code = 'inv', dir = 'encode';

function setCode(c, btn) {
  code = c;
  document.querySelectorAll('#codeToggle button').forEach(b => { b.className = ''; });
  btn.className = c === 'inv' ? 'active-inv' : 'active-avo';
  document.getElementById('output').className = 'output-box ' + c;
  convert();
}

function setDir(d, btn) {
  dir = d;
  document.querySelectorAll('.dir-toggle button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  convert();
}

function convert() {
  const input = document.getElementById('inputText').value.toUpperCase();
  const out = document.getElementById('output');
  if (!input.trim()) { out.textContent = ''; return; }

  let map;
  if (code === 'inv') {
    map = INV; // same for encode and decode (symmetric)
  } else {
    map = dir === 'encode' ? AVO_ENC : AVO_DEC;
  }

  out.textContent = input.split('').map(ch => {
    if (ch === ' ') return ' ';
    return map[ch] || ch;
  }).join('');
}

function clearAll() { document.getElementById('inputText').value = ''; document.getElementById('output').textContent = ''; }
function copyOutput() {
  navigator.clipboard.writeText(document.getElementById('output').textContent).then(() => {
    event.target.textContent = '✅ ' + scL10n.copie;
    setTimeout(() => event.target.textContent = '📋 ' + scL10n.copier, 1500);
  });
}

function addLetter(ch, type) {
  const ta = document.getElementById('inputText');
  ta.value += ch;
  // Auto-switch to matching code
  if (type !== code) {
    const btns = document.querySelectorAll('#codeToggle button');
    setCode(type, type === 'inv' ? btns[0] : btns[1]);
  }
  convert();
}

// Build tables
function buildTables() {
  const invT = document.getElementById('invTable');
  const avoT = document.getElementById('avoTable');

  ALPHA.split('').forEach(l => {
    // Inversé
    const c1 = document.createElement('div');
    c1.className = 'cipher-cell inv';
    c1.innerHTML = `<div class="from">${l}</div><div class="arrow">↓</div><div class="to">${INV[l]}</div>`;
    c1.onclick = () => addLetter(l, 'inv');
    invT.appendChild(c1);

    // Avocat
    const c2 = document.createElement('div');
    c2.className = 'cipher-cell avo';
    c2.innerHTML = `<div class="from">${l}</div><div class="arrow">↓</div><div class="to">${AVO_ENC[l]}</div>`;
    c2.onclick = () => addLetter(l, 'avo');
    avoT.appendChild(c2);
  });
}

buildTables();
</script>