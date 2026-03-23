<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--bg:#f0efe8;--card:#fff;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:var(--bg);color:var(--txt)}
.hero{background:linear-gradient(160deg,#0a1628,#1a2d50,#2a4070);padding:48px 24px 40px;text-align:center;position:relative;overflow:hidden}
.hero::before{content:'1 2 3 4 5 6 7 8 9 10 11 12 13 14 15 16 17 18 19 20 21 22 23 24 25 26';position:absolute;top:14px;left:50%;transform:translateX(-50%);font-family:'JetBrains Mono';font-size:11px;color:rgba(255,255,255,0.06);white-space:nowrap;letter-spacing:6px}
.hero h1{font-family:'Bitter',serif;font-size:2.8rem;color:#fff;position:relative}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.55);margin-top:6px;position:relative}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative}
.container{max-width:900px;margin:0 auto;padding:24px 16px}
.card{background:var(--card);border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:6px;display:flex;align-items:center;gap:10px}
.card h2 .icon{width:34px;height:34px;background:var(--g);border-radius:8px;display:flex;align-items:center;justify-content:center;color:#fff;font-size:16px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

/* Grid */
.alpha-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(72px,1fr));gap:6px;margin:16px 0}
.alpha-card{background:var(--cream);border:1.5px solid var(--bdr);border-radius:10px;padding:8px 4px;text-align:center;cursor:pointer;transition:all 0.15s}
.alpha-card:hover{border-color:var(--g);transform:translateY(-2px);box-shadow:0 4px 12px rgba(0,119,72,0.1)}
.alpha-card .ltr{font-family:'Bitter',serif;font-size:22px;font-weight:900;color:var(--g)}
.alpha-card .num{font-family:'JetBrains Mono';font-size:16px;font-weight:700;color:var(--soft)}
.alpha-card .roman{font-family:'Bitter',serif;font-size:11px;color:var(--gold);margin-top:1px}

/* Toggle */
.mode-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:20px;border:1px solid var(--bdr)}
.mode-toggle button{flex:1;padding:10px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:13px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.mode-toggle button.active{background:var(--g);color:#fff;box-shadow:0 2px 8px rgba(0,119,72,0.2)}

/* Direction */
.dir-toggle{display:flex;background:var(--bg);border-radius:10px;padding:4px;margin-bottom:16px;border:1px solid var(--bdr)}
.dir-toggle button{flex:1;padding:8px;border:none;background:none;font-family:'Nunito';font-weight:700;font-size:12px;border-radius:7px;cursor:pointer;color:var(--muted);transition:0.2s}
.dir-toggle button.active{background:#2a4070;color:#fff}

.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-box{background:#0a1628;border-radius:12px;padding:20px 24px;min-height:60px;font-family:'JetBrains Mono';font-size:20px;color:#6ea8ff;letter-spacing:4px;line-height:2;word-break:break-all}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}

/* Roman section */
.roman-info{background:var(--cream);border:1px solid var(--bdr);border-radius:12px;padding:20px;margin-top:20px}
.roman-info h3{font-family:'Bitter',serif;color:var(--g);margin-bottom:8px}
.roman-table{display:flex;gap:16px;flex-wrap:wrap;margin-top:8px}
.roman-item{background:#fff;border:1px solid var(--bdr);border-radius:8px;padding:8px 14px;text-align:center}
.roman-item .val{font-family:'Bitter',serif;font-size:20px;font-weight:900;color:#2a4070}
.roman-item .eq{font-size:12px;color:var(--muted)}

@media(max-width:600px){.hero h1{font-size:1.8rem}.alpha-grid{grid-template-columns:repeat(auto-fill,minmax(60px,1fr))}}
</style>
</div>

<div class="container">

<div class="card">
  <h2><span class="icon">🔢</span> <?php esc_html_e('Le principe', 'scout-codes'); ?></h2>
  <p class="desc"><?php echo wp_kses(__('Chaque lettre est remplacée par son numéro dans l\'alphabet. On peut aussi utiliser les <strong>chiffres romains</strong> pour rendre le code plus difficile à décoder. Cliquez sur une lettre pour l\'ajouter à votre message!', 'scout-codes'), ['strong' => []]); ?></p>
  <div class="alpha-grid" id="alphaGrid"></div>
</div>

<!-- ENCODER -->
<div class="card">
  <h2><span class="icon">⚡</span> <?php esc_html_e('Encodeur / Décodeur', 'scout-codes'); ?></h2>

  <div class="dir-toggle">
    <button class="active" onclick="setDir('encode',this)"><?php esc_html_e('Texte → Chiffres', 'scout-codes'); ?></button>
    <button onclick="setDir('decode',this)"><?php esc_html_e('Chiffres → Texte', 'scout-codes'); ?></button>
  </div>

  <div class="mode-toggle">
    <button class="active" onclick="setMode('num',this)"><?php esc_html_e('Chiffres (1-26)', 'scout-codes'); ?></button>
    <button onclick="setMode('roman',this)"><?php esc_html_e('Chiffres romains', 'scout-codes'); ?></button>
  </div>

  <div class="encoder-input">
    <textarea id="inputText" placeholder="<?php echo esc_attr__('Tapez votre message ici...', 'scout-codes'); ?>" oninput="convert()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-g" onclick="convert()"><?php esc_html_e('Convertir', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="clearAll()"><?php esc_html_e('Effacer', 'scout-codes'); ?></button>
    <button class="btn btn-o" onclick="copyOutput()">📋 <?php esc_html_e('Copier', 'scout-codes'); ?></button>
  </div>

  <div class="output-label" id="outLabel"><?php esc_html_e('CHIFFRES', 'scout-codes'); ?></div>
  <div class="output-box" id="output"></div>

  <div class="roman-info">
    <h3><?php esc_html_e('Chiffres romains — aide-mémoire', 'scout-codes'); ?></h3>
    <p style="font-size:0.85rem;color:var(--soft);margin-bottom:10px"><?php esc_html_e('Les unités de base : I=1, V=5, X=10, L=50, C=100, D=500, M=1000. Les plus grosses unités sont placées au début. Si une unité plus petite est placée devant une plus grosse, on la soustrait.', 'scout-codes'); ?></p>
    <div class="roman-table">
      <div class="roman-item"><div class="val">I</div><div class="eq">= 1</div></div>
      <div class="roman-item"><div class="val">V</div><div class="eq">= 5</div></div>
      <div class="roman-item"><div class="val">X</div><div class="eq">= 10</div></div>
      <div class="roman-item"><div class="val">L</div><div class="eq">= 50</div></div>
      <div class="roman-item"><div class="val">C</div><div class="eq">= 100</div></div>
      <div class="roman-item"><div class="val">D</div><div class="eq">= 500</div></div>
      <div class="roman-item"><div class="val">M</div><div class="eq">= 1000</div></div>
    </div>
    <p style="font-size:0.85rem;color:var(--muted);margin-top:10px"><strong>Ex:</strong> XVII = 10+5+1+1 = 17 · XL = 50−10 = 40 · MCMXCIV = 1994</p>
  </div>
</div>
</div>



<script>var scL10n = <?php echo wp_json_encode([
  'tapezMessage' => __('Tapez votre message ici...', 'scout-codes'),
  'entrezChiffres' => __('Entrez les chiffres séparés par des espaces (ex: 1 12 5 24)...', 'scout-codes'),
  'chiffresRomains' => __('CHIFFRES ROMAINS', 'scout-codes'),
  'chiffres' => __('CHIFFRES', 'scout-codes'),
  'texte' => __('TEXTE', 'scout-codes'),
  'copie' => __('Copié!', 'scout-codes'),
  'copier' => __('Copier', 'scout-codes'),
]); ?>;</script>
<script>
let mode='num', dir='encode';

function toRoman(n){
  const vals=[1000,900,500,400,100,90,50,40,10,9,5,4,1];
  const syms=['M','CM','D','CD','C','XC','L','XL','X','IX','V','IV','I'];
  let r='';for(let i=0;i<vals.length;i++)while(n>=vals[i]){r+=syms[i];n-=vals[i]}return r;
}
function fromRoman(s){
  const map={I:1,V:5,X:10,L:50,C:100,D:500,M:1000};
  let total=0;for(let i=0;i<s.length;i++){const c=map[s[i]]||0,n=map[s[i+1]]||0;if(c<n){total-=c}else{total+=c}}return total;
}

function setMode(m,btn){mode=m;document.querySelectorAll('.mode-toggle button').forEach(b=>b.classList.remove('active'));btn.classList.add('active');convert()}
function setDir(d,btn){dir=d;document.querySelectorAll('.dir-toggle button').forEach(b=>b.classList.remove('active'));btn.classList.add('active');
  document.getElementById('inputText').placeholder=d==='encode'?scL10n.tapezMessage:scL10n.entrezChiffres;
  document.getElementById('outLabel').textContent=d==='encode'?(mode==='roman'?scL10n.chiffresRomains:scL10n.chiffres):scL10n.texte;
  convert();
}

function convert(){
  const input=document.getElementById('inputText').value;
  const out=document.getElementById('output');
  if(!input.trim()){out.textContent='';return}
  let result;
  if(dir==='encode'){
    result=input.toUpperCase().split('').map(ch=>{
      if(ch===' ')return mode==='roman'?'  ':'·';
      const n=ch.charCodeAt(0)-64;
      if(n<1||n>26)return'';
      return mode==='roman'?toRoman(n):String(n);
    }).filter(x=>x!=='').join(mode==='roman'?' ':' ');
  } else {
    if(mode==='roman'){
      result=input.trim().split(/\s+/).map(s=>{
        if(!s)return' ';
        const n=fromRoman(s.toUpperCase());
        return(n>=1&&n<=26)?String.fromCharCode(64+n):'?';
      }).join('');
    } else {
      result=input.trim().split(/[\s,·.;-]+/).map(s=>{
        const n=parseInt(s);
        return(n>=1&&n<=26)?String.fromCharCode(64+n):'?';
      }).join('');
    }
  }
  out.textContent=result;
}

function clearAll(){document.getElementById('inputText').value='';document.getElementById('output').textContent=''}
function copyOutput(){navigator.clipboard.writeText(document.getElementById('output').textContent).then(()=>{event.target.textContent='✅ '+scL10n.copie;setTimeout(()=>event.target.textContent='📋 '+scL10n.copier,1500)})}

// Build grid
const grid=document.getElementById('alphaGrid');
for(let i=1;i<=26;i++){
  const ch=String.fromCharCode(64+i);
  const c=document.createElement('div');c.className='alpha-card';
  c.innerHTML=`<div class="ltr">${ch}</div><div class="num">${i}</div><div class="roman">${toRoman(i)}</div>`;
  c.onclick=()=>{const ta=document.getElementById('inputText');
    if(dir==='encode')ta.value+=ch;
    else ta.value+=(ta.value&&!ta.value.endsWith(' ')?' ':'')+i;
    convert()};
  grid.appendChild(c);
}
</script>