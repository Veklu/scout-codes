<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a1000,#3a2800,#5a4000);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.4rem;color:#fff}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:32px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.5rem;margin-bottom:8px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
.section-divider{border:none;height:3px;background:linear-gradient(90deg,var(--gold),var(--g),transparent);margin:40px 0;border-radius:2px}
textarea.enc{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:50px;margin-bottom:12px}
textarea.enc:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}

/* Tables */
.alpha-table{display:grid;grid-template-columns:repeat(auto-fill,minmax(72px,1fr));gap:5px;margin:16px 0}
.alpha-item{background:var(--cream);border:1px solid var(--bdr);border-radius:8px;padding:6px 4px;text-align:center;cursor:pointer;transition:0.15s}
.alpha-item:hover{border-color:var(--g);transform:translateY(-2px)}
.alpha-item .lat{font-family:'Bitter';font-size:14px;font-weight:700;color:var(--g)}
.alpha-item .alt{font-size:18px;color:var(--txt);margin-top:2px}
.alpha-item .rune{font-size:20px}

.output-box{background:#1a1000;border-radius:12px;padding:16px 20px;min-height:50px;font-size:24px;letter-spacing:6px;line-height:2;word-break:break-all;color:var(--gold)}

/* Semaphore */
.sem-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(70px,1fr));gap:6px;margin:16px 0}
.sem-card{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:6px;text-align:center;cursor:pointer;transition:0.15s}
.sem-card:hover{border-color:var(--g);transform:translateY(-2px)}
.sem-card .ltr{font-family:'Bitter';font-size:14px;font-weight:700;color:var(--g)}
.sem-output{background:#fdfcf7;border:2px solid var(--bdr);border-radius:12px;padding:20px;display:flex;flex-wrap:wrap;gap:6px;min-height:60px;align-items:center}
.sem-sym{text-align:center}
.sem-sym .slbl{font-size:9px;color:var(--muted);margin-top:1px}
.word-gap{width:20px}

@media(max-width:600px){.hero h1{font-size:1.6rem}}
</style>
</div>
<div class="container">

<!-- ═══ GREC / CYRILLIQUE ═══ -->
<div class="card">
  <h2>🏛️ <?php esc_html_e('Alphabet Grec et Cyrillique', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('On remplace chaque lettre latine par son équivalent grec (GR.) ou cyrillique russe (CYR.). C\'est un code de substitution visuel — le message semble être dans une autre langue (p. 140).', 'scout-codes'); ?></p>

  <div style="display:flex;gap:24px;flex-wrap:wrap">
    <div style="flex:1;min-width:250px">
      <div class="output-label"><?php esc_html_e('ALPHABET GREC', 'scout-codes'); ?></div>
      <div class="alpha-table" id="greekTable"></div>
    </div>
    <div style="flex:1;min-width:250px">
      <div class="output-label"><?php esc_html_e('ALPHABET CYRILLIQUE', 'scout-codes'); ?></div>
      <div class="alpha-table" id="cyrTable"></div>
    </div>
  </div>

  <textarea class="enc" id="grcInput" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encodeGrc()"></textarea>
  <div class="btn-row">
    <button class="btn btn-g" onclick="grcMode='gr';encodeGrc()"><?php esc_html_e('Grec', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="grcMode='cyr';encodeGrc()"><?php esc_html_e('Cyrillique', 'scout-codes'); ?></button>
  </div>
  <div class="output-label" id="grcLabel"><?php esc_html_e('GREC', 'scout-codes'); ?></div>
  <div class="output-box" id="grcOut"></div>
</div>

<hr class="section-divider">

<!-- ═══ RUNIQUE ═══ -->
<div class="card">
  <h2>ᚱ <?php esc_html_e('L\'Alphabet Runique (Viking)', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('Les runes sont l\'écriture des anciens peuples nordiques (Vikings). Chaque lettre latine a un équivalent runique. Parfait pour les messages mystérieux! (p. 143)', 'scout-codes'); ?></p>

  <div class="alpha-table" id="runeTable"></div>

  <textarea class="enc" id="runeInput" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encodeRune()"></textarea>
  <div class="btn-row"><button class="btn btn-g" onclick="encodeRune()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button><button class="btn btn-o" onclick="document.getElementById('runeInput').value='';document.getElementById('runeOut').textContent=''"><?php esc_html_e('Effacer', 'scout-codes'); ?></button></div>
  <div class="output-label"><?php esc_html_e('RUNES', 'scout-codes'); ?></div>
  <div class="output-box" id="runeOut" style="font-size:28px;letter-spacing:8px"></div>
</div>

<hr class="section-divider">

<!-- ═══ SÉMAPHORE ═══ -->
<div class="card">
  <h2>🚩 <?php esc_html_e('Le Code du Sémaphore', 'scout-codes'); ?></h2>
  <p class="desc"><?php esc_html_e('Le code est interprété comme si on voyait quelqu\'un qui agite deux drapeaux de face. Le bras droit et le bras gauche prennent différentes positions pour former chaque lettre. Utilisez du tissu blanc et rouge pour être vu de loin (p. 141).', 'scout-codes'); ?></p>

  <div class="sem-grid" id="semGrid"></div>

  <textarea class="enc" id="semInput" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encodeSem()"></textarea>
  <div class="btn-row"><button class="btn btn-g" onclick="encodeSem()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button><button class="btn btn-o" onclick="document.getElementById('semInput').value='';document.getElementById('semOut').innerHTML=''"><?php esc_html_e('Effacer', 'scout-codes'); ?></button></div>
  <div class="output-label"><?php esc_html_e('SÉMAPHORE', 'scout-codes'); ?></div>
  <div class="sem-output" id="semOut"></div>
</div>

</div>


<script>var scL10n = <?php echo wp_json_encode([
  'grec' => __('GREC', 'scout-codes'),
  'cyrillique' => __('CYRILLIQUE', 'scout-codes'),
]); ?>;</script>
<script>
// ═══ GREC / CYRILLIQUE ═══
const GREEK = {A:'Α',B:'Β',C:'-',D:'Δ',E:'Ε',F:'Φ',G:'Γ',H:'Η',I:'Ι',J:'-',K:'Κ',L:'Λ',M:'Μ',N:'Ν',O:'Ο',P:'Π',Q:'Θ',R:'Ρ',S:'Σ',T:'Τ',U:'Υ',V:'-',W:'-',X:'Ξ',Y:'Ψ',Z:'Ζ'};
// Note: some letters don't have direct Greek equivalents — marked with -
// From book: TH=Θ, PS=Ψ, ô=Ω
const CYR = {A:'А',B:'Б',C:'-',D:'Д',E:'Е',F:'Ф',G:'Г',H:'И',I:'-',J:'Ж',K:'К',L:'Л',M:'М',N:'Н',O:'О',P:'П',Q:'-',R:'Р',S:'С',T:'Т',U:'У',V:'В',W:'-',X:'-',Y:'Э',Z:'-'};

let grcMode = 'gr';
function encodeGrc() {
  const input = document.getElementById('grcInput').value.toUpperCase();
  const out = document.getElementById('grcOut');
  document.getElementById('grcLabel').textContent = grcMode === 'gr' ? scL10n.grec : scL10n.cyrillique;
  const map = grcMode === 'gr' ? GREEK : CYR;
  out.textContent = input.split('').map(ch => ch === ' ' ? '  ' : (map[ch] || ch)).join('');
}

// Build tables
const grT = document.getElementById('greekTable');
const cyT = document.getElementById('cyrTable');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(l => {
  if (GREEK[l] !== '-') {
    const c = document.createElement('div'); c.className = 'alpha-item';
    c.innerHTML = `<div class="lat">${l}</div><div class="alt">${GREEK[l]}</div>`;
    c.onclick = () => { document.getElementById('grcInput').value += l; grcMode='gr'; encodeGrc(); };
    grT.appendChild(c);
  }
  if (CYR[l] !== '-') {
    const c = document.createElement('div'); c.className = 'alpha-item';
    c.innerHTML = `<div class="lat">${l}</div><div class="alt">${CYR[l]}</div>`;
    c.onclick = () => { document.getElementById('grcInput').value += l; grcMode='cyr'; encodeGrc(); };
    cyT.appendChild(c);
  }
});

// ═══ RUNIQUE ═══
const RUNES = {A:'ᚨ',B:'ᛒ',C:'ᚲ',D:'ᛞ',E:'ᛖ',F:'ᚠ',G:'ᚷ',H:'ᚺ',I:'ᛁ',J:'ᛃ',K:'ᚲ',L:'ᛚ',M:'ᛗ',N:'ᚾ',O:'ᛟ',P:'ᛈ',Q:'ᚲ',R:'ᚱ',S:'ᛊ',T:'ᛏ',U:'ᚢ',V:'ᚡ',W:'ᚹ',X:'ᛊ',Y:'ᛃ',Z:'ᛉ'};

function encodeRune() {
  const input = document.getElementById('runeInput').value.toUpperCase();
  document.getElementById('runeOut').textContent = input.split('').map(ch => ch === ' ' ? '  ' : (RUNES[ch] || ch)).join('');
}

const ruT = document.getElementById('runeTable');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(l => {
  const c = document.createElement('div'); c.className = 'alpha-item';
  c.innerHTML = `<div class="lat">${l}</div><div class="alt rune">${RUNES[l]}</div>`;
  c.onclick = () => { document.getElementById('runeInput').value += l; encodeRune(); };
  ruT.appendChild(c);
});

// ═══ SÉMAPHORE ═══
// Semaphore positions: angles for right and left arms (as seen from front)
// 0=down, 45=down-left, 90=left, 135=up-left, 180=up, 225=up-right, 270=right, 315=down-right
// From the book diagram, positions grouped by right arm angle
const SEM = {
  A:{r:225,l:270}, B:{r:180,l:270}, C:{r:135,l:270}, D:{r:90,l:270},
  E:{r:270,l:315}, F:{r:270,l:0}, G:{r:270,l:45},
  H:{r:225,l:180}, I:{r:225,l:135}, J:{r:90,l:0},
  K:{r:225,l:90}, L:{r:225,l:45}, M:{r:225,l:0}, N:{r:225,l:315},
  O:{r:180,l:135}, P:{r:180,l:90}, Q:{r:180,l:45}, R:{r:180,l:0}, S:{r:180,l:315},
  T:{r:135,l:90}, U:{r:135,l:45}, V:{r:90,l:315}, W:{r:0,l:45}, X:{r:0,l:135}, Y:{r:135,l:0}, Z:{r:45,l:0}
};

function drawSemaphore(letter, size) {
  const s = size || 48;
  const info = SEM[letter.toUpperCase()];
  if (!info) return '';
  const cx = s/2, cy = s/2;
  const armLen = s * 0.38;

  function armEnd(angleDeg) {
    const rad = (angleDeg - 90) * Math.PI / 180;
    return { x: cx + Math.cos(rad) * armLen, y: cy + Math.sin(rad) * armLen };
  }

  const rEnd = armEnd(info.r);
  const lEnd = armEnd(info.l);

  let svg = `<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">`;
  // Body
  svg += `<circle cx="${cx}" cy="${cy}" r="4" fill="#1a1a16"/>`;
  // Right arm (red flag)
  svg += `<line x1="${cx}" y1="${cy}" x2="${rEnd.x}" y2="${rEnd.y}" stroke="#c0392b" stroke-width="2.5" stroke-linecap="round"/>`;
  svg += `<circle cx="${rEnd.x}" cy="${rEnd.y}" r="3" fill="#c0392b"/>`;
  // Left arm (yellow flag)
  svg += `<line x1="${cx}" y1="${cy}" x2="${lEnd.x}" y2="${lEnd.y}" stroke="#d4a017" stroke-width="2.5" stroke-linecap="round"/>`;
  svg += `<circle cx="${lEnd.x}" cy="${lEnd.y}" r="3" fill="#d4a017"/>`;
  svg += '</svg>';
  return svg;
}

// Build semaphore grid
const semG = document.getElementById('semGrid');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(l => {
  const c = document.createElement('div'); c.className = 'sem-card';
  c.innerHTML = `<div class="ltr">${l}</div>${drawSemaphore(l, 40)}`;
  c.onclick = () => { document.getElementById('semInput').value += l; encodeSem(); };
  semG.appendChild(c);
});

function encodeSem() {
  const input = document.getElementById('semInput').value.toUpperCase();
  const out = document.getElementById('semOut');
  if (!input.trim()) { out.innerHTML = ''; return; }
  let html = '';
  for (const ch of input) {
    if (ch === ' ') { html += '<div class="word-gap"></div>'; continue; }
    const svg = drawSemaphore(ch, 52);
    if (svg) html += `<div class="sem-sym">${svg}<div class="slbl">${ch}</div></div>`;
  }
  out.innerHTML = html;
}
</script>