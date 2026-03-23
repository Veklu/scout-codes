<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--red:#c0392b}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a0000,#3a0808,#5a1010);padding:48px 24px 40px;text-align:center;position:relative;overflow:hidden}
.hero h1{font-family:'Bitter',serif;font-size:2.6rem;color:#fff;position:relative}
.hero h1 span{color:var(--red)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px;position:relative}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--red);font-size:1.4rem;margin-bottom:6px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

/* Alphabet grid */
.alpha-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(80px,1fr));gap:6px;margin:16px 0}
.alpha-card{background:var(--cream);border:1.5px solid var(--bdr);border-radius:10px;padding:6px;text-align:center;cursor:pointer;transition:0.15s}
.alpha-card:hover{border-color:var(--red);transform:translateY(-2px);box-shadow:0 4px 12px rgba(192,57,43,0.1)}
.alpha-card .ltr{font-family:'Bitter',serif;font-size:18px;font-weight:900;color:var(--red)}
.alpha-card .code{font-family:'JetBrains Mono';font-size:10px;color:var(--muted);margin-top:1px}
.alpha-card .vowel{background:rgba(192,57,43,0.08);border-color:rgba(192,57,43,0.3)}

/* Encoder */
.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.dir-toggle button{flex:1;padding:8px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:12px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:var(--red);color:#fff}
.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--red);box-shadow:0 0 0 3px rgba(192,57,43,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-r{background:var(--red);color:#fff}.btn-r:hover{background:#a93226}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--red);color:var(--red)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}

.output-area{background:#fdfcf7;border:2px dashed var(--bdr);border-radius:12px;padding:20px;min-height:80px;display:flex;flex-wrap:wrap;gap:8px;align-items:center}
.output-area.active{border-color:var(--red);border-style:solid}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.word-gap{width:20px;height:50px}
.placeholder{color:var(--bdr);font-size:14px;font-style:italic;width:100%;text-align:center;padding:20px}
.sym-wrap{text-align:center}
.sym-wrap .lbl{font-size:10px;color:var(--muted);margin-top:-2px}

.legend{background:linear-gradient(135deg,#fff5f5,var(--cream));border:1px solid #f0c0c0;border-radius:12px;padding:20px;margin:16px 0;font-size:0.9rem;color:var(--soft);line-height:1.8}
.legend strong{color:var(--red)}
.example{background:var(--cream);border:1px solid var(--bdr);border-radius:12px;padding:20px;margin-top:20px}
.example strong{color:var(--red)}
.example-row{display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:12px}

@media(max-width:600px){.hero h1{font-size:1.8rem}.alpha-grid{grid-template-columns:repeat(auto-fill,minmax(65px,1fr))}}
</style>
</div>

<div class="container">

<div class="card">
  <h2><?php esc_html_e('Comment ça marche?', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('La clé : on commence la lecture par les <strong>traits verticaux</strong> (les voyelles), puis les <strong>traits horizontaux</strong> (qui avancent dans l\'alphabet après cette voyelle).', 'scout-codes'), ['strong' => []]); ?></p>

  <div class="legend">
    <strong><?php esc_html_e('Voyelles = traits verticaux :', 'scout-codes'); ?></strong> A=1V, E=2V, I=3V, O=4V, U=5V, Y=6V<br>
    <strong><?php esc_html_e('Consonnes = voyelle + traits horizontaux :', 'scout-codes'); ?></strong> <?php esc_html_e('À partir de la voyelle, on avance dans l\'alphabet avec les traits horizontaux.', 'scout-codes'); ?><br>
    <?php esc_html_e('Exemple : B = 1V+1H (1 après A), C = 1V+2H (2 après A), D = 1V+3H (3 après A)', 'scout-codes'); ?><br>
    F = 2V+1H (1 après E), G = 2V+2H, H = 2V+3H<br><br>
    <strong><?php esc_html_e('Lecture :', 'scout-codes'); ?></strong> <?php esc_html_e('Traits verticaux d\'abord → donne la voyelle de base → traits horizontaux → avance d\'autant de lettres.', 'scout-codes'); ?>
  </div>

  <div class="alpha-grid" id="alphaGrid"></div>

  <div class="example">
    <strong><?php esc_html_e('Exemple : CHAT', 'scout-codes'); ?></strong>
    <div class="example-row" id="exampleRow"></div>
  </div>
</div>

<!-- ENCODER -->
<div class="card">
  <h2>✏️ <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>

  <div class="dir-toggle">
    <button class="active" onclick="setDir('encode',this)"><?php esc_html_e('Texte → Samouraï', 'scout-codes'); ?></button>
    <button onclick="setDir('decode',this)"><?php esc_html_e('Samouraï → Texte', 'scout-codes'); ?></button>
  </div>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="convert()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-r" onclick="convert()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="downloadSVG()">📥 <?php esc_html_e('SVG', 'scout-codes'); ?></button>
  </div>

  <div class="output-label" id="outLabel"><?php esc_html_e('SYMBOLES SAMOURAÏS', 'scout-codes'); ?></div>
  <div class="output-area" id="output"><div class="placeholder"><?php esc_html_e('Votre message apparaîtra ici...', 'scout-codes'); ?></div></div>
</div>
</div>



<script>var scL10n = <?php echo wp_json_encode([
  'tapezMessage' => __('Tapez votre message ici...', 'scout-codes'),
  'entrezCode' => __('Entrez le code (ex: 1V+2H 2V+3H ou 1,2 2,3) séparé par espaces...', 'scout-codes'),
  'symbolesSamourais' => __('SYMBOLES SAMOURAÏS', 'scout-codes'),
  'texte' => __('TEXTE', 'scout-codes'),
  'messageApparaitra' => __('Votre message apparaîtra ici...', 'scout-codes'),
]); ?>;</script>
<script>
// Samouraï mapping from the book (p.131)
// Vowels: vertical lines only
// Consonants: vertical (vowel group) + horizontal (offset)
const MAP = {
  A:{v:1,h:0}, B:{v:1,h:1}, C:{v:1,h:2}, D:{v:1,h:3},
  E:{v:2,h:0}, F:{v:2,h:1}, G:{v:2,h:2}, H:{v:2,h:3},
  I:{v:3,h:0}, J:{v:3,h:1}, K:{v:3,h:2}, L:{v:3,h:3}, M:{v:3,h:4}, N:{v:3,h:5},
  O:{v:4,h:0}, P:{v:4,h:1}, Q:{v:4,h:2}, R:{v:4,h:3}, S:{v:4,h:4}, T:{v:4,h:5},
  U:{v:5,h:0}, V:{v:5,h:1}, W:{v:5,h:2}, X:{v:5,h:3},
  Y:{v:6,h:0}, Z:{v:6,h:1},
};

// Reverse lookup
const REV = {};
for (const [l, {v, h}] of Object.entries(MAP)) REV[`${v},${h}`] = l;

let dir = 'encode';

function codeStr(l) {
  const m = MAP[l];
  if (!m) return '';
  if (m.h === 0) return `${m.v}V`;
  return `${m.v}V+${m.h}H`;
}

function drawSymbol(letter, size) {
  const m = MAP[letter.toUpperCase()];
  if (!m) return '';
  const s = size || 50;
  const pad = 6;
  const vSpacing = 6;
  const hSpacing = 5;
  const vLen = s - 2 * pad;
  const hLen = s - 2 * pad;

  // Calculate width needed
  const vBlockW = m.v * vSpacing + 4;
  const totalW = Math.max(vBlockW, hLen);
  const startX = (s - vBlockW) / 2;

  let d = '';
  const stroke = '#1a1a16';
  const vsw = 2.5;
  const hsw = 2;

  // Draw vertical lines (red tint)
  for (let i = 0; i < m.v; i++) {
    const x = startX + i * vSpacing + 3;
    d += `<line x1="${x}" y1="${pad}" x2="${x}" y2="${pad + vLen}" stroke="#8b1a1a" stroke-width="${vsw}" stroke-linecap="round"/>`;
  }

  // Draw horizontal lines (dark) — evenly spaced
  if (m.h > 0) {
    const hSpaceTotal = s - 2 * pad;
    const hGap = hSpaceTotal / (m.h + 1);
    for (let i = 0; i < m.h; i++) {
      const y = pad + hGap * (i + 1);
      d += `<line x1="${pad}" y1="${y}" x2="${s - pad}" y2="${y}" stroke="${stroke}" stroke-width="${hsw}" stroke-linecap="round"/>`;
    }
  }

  return `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${d}</svg>`;
}

function setDir(d, btn) {
  dir = d;
  document.querySelectorAll('.dir-toggle button').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  document.getElementById('inputText').placeholder = d === 'encode'
    ? scL10n.tapezMessage
    : scL10n.entrezCode;
  document.getElementById('outLabel').textContent = d === 'encode' ? scL10n.symbolesSamourais : scL10n.texte;
  convert();
}

function convert() {
  const input = document.getElementById('inputText').value;
  const o = document.getElementById('output');
  if (!input.trim()) { o.innerHTML = '<div class="placeholder">' + scL10n.messageApparaitra + '</div>'; o.classList.remove('active'); return; }
  o.classList.add('active');

  if (dir === 'encode') {
    let html = '';
    for (const ch of input.toUpperCase()) {
      if (ch === ' ') { html += '<div class="word-gap"></div>'; continue; }
      const svg = drawSymbol(ch, 50);
      if (svg) html += `<div class="sym-wrap">${svg}<div class="lbl">${ch}</div></div>`;
    }
    o.innerHTML = html;
  } else {
    // Decode: "1V+2H 2V 3V+1H" or "1,2 2,0 3,1"
    const parts = input.trim().split(/\s+/);
    let result = '';
    for (const p of parts) {
      let v = 0, h = 0;
      const m1 = p.match(/(\d+)\s*V\s*\+?\s*(\d+)\s*H/i);
      const m2 = p.match(/(\d+)\s*V/i);
      const m3 = p.match(/(\d+)\s*,\s*(\d+)/);
      if (m1) { v = parseInt(m1[1]); h = parseInt(m1[2]); }
      else if (m2) { v = parseInt(m2[1]); h = 0; }
      else if (m3) { v = parseInt(m3[1]); h = parseInt(m3[2]); }
      const letter = REV[`${v},${h}`];
      result += letter || '?';
    }
    o.innerHTML = `<div style="font-family:'JetBrains Mono';font-size:24px;color:#8b1a1a;letter-spacing:4px">${result}</div>`;
  }
}

function clearAll() { document.getElementById('inputText').value = ''; const o = document.getElementById('output'); o.innerHTML = '<div class="placeholder">' + scL10n.messageApparaitra + '</div>'; o.classList.remove('active'); }

function downloadSVG() {
  const svgs = document.getElementById('output').querySelectorAll('svg');
  if (!svgs.length) return;
  const gap = 56, W = svgs.length * gap + 20; let inner = '', x = 10;
  svgs.forEach(svg => { inner += `<g transform="translate(${x},10)">${svg.innerHTML}</g>`; x += gap; });
  const a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="70" viewBox="0 0 ${W} 70">${inner}</svg>`], { type: 'image/svg+xml' }));
  a.download = 'message-samourais.svg'; a.click();
}

function addLetter(ch) { document.getElementById('inputText').value += ch; convert(); }

// Build grid
const grid = document.getElementById('alphaGrid');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(l => {
  const c = document.createElement('div');
  c.className = 'alpha-card' + (MAP[l].h === 0 ? ' vowel' : '');
  c.innerHTML = `<div class="ltr">${l}</div>${drawSymbol(l, 36)}<div class="code">${codeStr(l)}</div>`;
  c.onclick = () => addLetter(l);
  grid.appendChild(c);
});

// Example: CHAT
const eRow = document.getElementById('exampleRow');
'CHAT'.split('').forEach(ch => {
  eRow.innerHTML += `<div class="sym-wrap">${drawSymbol(ch, 54)}<div style="font-size:12px;color:var(--muted);font-weight:700">${ch}</div><div style="font-size:9px;color:var(--gold)">${codeStr(ch)}</div></div>`;
});
</script>