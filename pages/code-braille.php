<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--purple:#6c3483}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#1a1028,#2a1a40,#3a2a58);padding:48px 24px;text-align:center}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:6px}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px}
.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--purple);font-size:1.4rem;margin-bottom:8px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}
textarea.enc{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;margin-bottom:12px}
textarea.enc:focus{outline:none;border-color:var(--purple);box-shadow:0 0 0 3px rgba(108,52,131,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-p{background:var(--purple);color:#fff}.btn-p:hover{background:#4a235a}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--purple);color:var(--purple)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}

.braille-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(68px,1fr));gap:6px;margin:16px 0}
.braille-card{background:var(--cream);border:1.5px solid var(--bdr);border-radius:10px;padding:10px 4px;text-align:center;cursor:pointer;transition:0.15s}
.braille-card:hover{border-color:var(--purple);transform:translateY(-2px)}
.braille-card .ltr{font-family:'Bitter',serif;font-size:18px;font-weight:900;color:var(--purple)}

.braille-output{background:#fdfcf7;border:2px solid var(--bdr);border-radius:12px;padding:20px;display:flex;flex-wrap:wrap;gap:12px;min-height:80px;align-items:center}
.braille-sym{text-align:center}
.braille-sym .blbl{font-size:10px;color:var(--muted);margin-top:4px}
.word-gap{width:20px}

.legend{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:16px;margin:16px 0;font-size:0.85rem;color:var(--soft);line-height:1.7}
.legend strong{color:var(--purple)}

@media(max-width:600px){.hero h1{font-size:1.8rem}}
</style>
</div>
<div class="container">
<div class="card">
  <h2><?php esc_html_e('Comment ça marche?', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Chaque lettre est représentée par une cellule de <strong>2 colonnes × 3 rangées</strong> (6 positions). Les gros points sont en relief (remplis), les petits sont absents (vides). Pour les chiffres, on ajoute un préfixe spécial ⠼ devant les lettres A(=1) à J(=0).', 'scout-codes'), ['strong' => []]); ?></p>
  <div class="legend">
    <strong><?php esc_html_e('Positions dans la cellule :', 'scout-codes'); ?></strong><br>
    ① ④<br>② ⑤<br>③ ⑥<br><br>
    <?php esc_html_e('Seuls les gros points sont imprimés. Les petits points sont donnés ici pour référence seulement.', 'scout-codes'); ?>
  </div>
  <div class="output-label"><?php esc_html_e('ALPHABET — CLIQUEZ POUR AJOUTER', 'scout-codes'); ?></div>
  <div class="braille-grid" id="brailleGrid"></div>
</div>
<div class="card">
  <h2>✏️ <?php esc_html_e('Encodeur', 'scout-codes'); ?></h2>
  <textarea class="enc" id="inp" placeholder="<?php echo esc_attr__('Tapez votre message...', 'scout-codes'); ?>" oninput="encode()"></textarea>
  <div class="btn-row">
    <button class="btn btn-p" onclick="encode()"><?php esc_html_e('Encoder', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="document.getElementById('inp').value='';document.getElementById('out').innerHTML=''"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="exportSVG()">📥 <?php esc_html_e('Exporter SVG', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="exportTxt()">💾 <?php esc_html_e('Exporter .txt', 'scout-codes'); ?></button>
  </div>
  <div class="output-label"><?php esc_html_e('BRAILLE', 'scout-codes'); ?></div>
  <div class="braille-output" id="out"></div>
</div>
</div>

<script>var scL10n = <?php echo wp_json_encode([
  'original' => __('Original:', 'scout-codes'),
]); ?>;</script>
<script>
// Braille: 2x3 grid, positions:
// 1 4
// 2 5
// 3 6
var BRAILLE = {
  A:[1],B:[1,2],C:[1,4],D:[1,4,5],E:[1,5],F:[1,2,4],G:[1,2,4,5],H:[1,2,5],I:[2,4],J:[2,4,5],
  K:[1,3],L:[1,2,3],M:[1,3,4],N:[1,3,4,5],O:[1,3,5],P:[1,2,3,4],Q:[1,2,3,4,5],R:[1,2,3,5],S:[2,3,4],T:[2,3,4,5],
  U:[1,3,6],V:[1,2,3,6],W:[2,4,5,6],X:[1,3,4,6],Y:[1,3,4,5,6],Z:[1,3,5,6]
};

// Position coordinates in the SVG cell
// Properly spaced: 2 columns, 3 rows with GOOD vertical spacing
function drawBrailleCell(dots, size) {
  var s = size || 30;
  var h = s * 1.6; // taller than wide for vertical spacing
  var colGap = s * 0.5;
  var rowGap = h * 0.25;
  var cx1 = s * 0.3;
  var cx2 = s * 0.7;
  var ry1 = h * 0.2;
  var ry2 = h * 0.45;
  var ry3 = h * 0.7;
  var r = Math.max(3.5, s * 0.12);
  var rSmall = Math.max(2, s * 0.06);

  var positions = {
    1: [cx1, ry1], 4: [cx2, ry1],
    2: [cx1, ry2], 5: [cx2, ry2],
    3: [cx1, ry3], 6: [cx2, ry3]
  };

  var svg = '<svg width="' + s + '" height="' + h + '" viewBox="0 0 ' + s + ' ' + h + '">';
  for (var pos = 1; pos <= 6; pos++) {
    var coords = positions[pos];
    var on = dots.indexOf(pos) !== -1;
    if (on) {
      svg += '<circle cx="' + coords[0] + '" cy="' + coords[1] + '" r="' + r + '" fill="#1a1a16"/>';
    } else {
      svg += '<circle cx="' + coords[0] + '" cy="' + coords[1] + '" r="' + rSmall + '" fill="none" stroke="#ccc" stroke-width="1"/>';
    }
  }
  svg += '</svg>';
  return svg;
}

// Build grid
var grid = document.getElementById('brailleGrid');
'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('').forEach(function(l) {
  var c = document.createElement('div');
  c.className = 'braille-card';
  c.innerHTML = '<div class="ltr">' + l + '</div>' + drawBrailleCell(BRAILLE[l], 28);
  c.onclick = function() { document.getElementById('inp').value += l; encode(); };
  grid.appendChild(c);
});

function encode() {
  var input = document.getElementById('inp').value.toUpperCase();
  var out = document.getElementById('out');
  if (!input.trim()) { out.innerHTML = ''; return; }
  var html = '';
  for (var i = 0; i < input.length; i++) {
    var ch = input[i];
    if (ch === ' ') { html += '<div class="word-gap"></div>'; continue; }
    var dots = BRAILLE[ch];
    if (dots) {
      html += '<div class="braille-sym">' + drawBrailleCell(dots, 32) + '<div class="blbl">' + ch + '</div></div>';
    }
  }
  out.innerHTML = html;
}

function exportSVG() {
  var svgs = document.getElementById('out').querySelectorAll('svg');
  if (!svgs.length) return;
  var gap = 44;
  var W = svgs.length * gap + 20;
  var H = 65;
  var inner = '';
  var x = 10;
  svgs.forEach(function(svg) {
    inner += '<g transform="translate(' + x + ',5)">' + svg.innerHTML + '</g>';
    x += gap;
  });
  var full = '<svg xmlns="http://www.w3.org/2000/svg" width="' + W + '" height="' + H + '" viewBox="0 0 ' + W + ' ' + H + '">' + inner + '</svg>';
  var a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([full], {type: 'image/svg+xml'}));
  a.download = 'message-braille.svg';
  a.click();
}

function exportTxt() {
  var input = document.getElementById('inp').value.toUpperCase();
  // Unicode braille characters
  var UNICODE = {A:'⠁',B:'⠃',C:'⠉',D:'⠙',E:'⠑',F:'⠋',G:'⠛',H:'⠓',I:'⠊',J:'⠚',K:'⠅',L:'⠇',M:'⠍',N:'⠝',O:'⠕',P:'⠏',Q:'⠟',R:'⠗',S:'⠎',T:'⠞',U:'⠥',V:'⠧',W:'⠺',X:'⠭',Y:'⠽',Z:'⠵'};
  var brailleStr = '';
  for (var i = 0; i < input.length; i++) {
    var ch = input[i];
    brailleStr += ch === ' ' ? ' ' : (UNICODE[ch] || ch);
  }
  var content = 'ALPHABET BRAILLE\n\n' + scL10n.original + ' ' + input + '\nBraille Unicode: ' + brailleStr + '\n';
  var a = document.createElement('a');
  a.href = URL.createObjectURL(new Blob([content], {type: 'text/plain; charset=utf-8'}));
  a.download = 'message-braille.txt';
  a.click();
}
</script>