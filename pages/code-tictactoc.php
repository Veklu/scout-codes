<style scoped>
:root{--g:#007748;--gd:#005a36;--gold:#d4a017;--cream:#faf8f0;--txt:#1a1a16;--soft:#3a3a36;--muted:#6a6a62;--bdr:#d8d5cc;--chalk:#e8e4d8;--board:#2e4a2e}
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Nunito',sans-serif;background:#f0efe8;color:var(--txt)}

.hero{background:#1e3a1e;padding:48px 24px 40px;text-align:center;position:relative;overflow:hidden}
.hero h1{font-family:'Caveat',cursive;font-size:3.2rem;color:var(--chalk);position:relative}
.hero h1 span{color:var(--gold)}
.hero p{color:rgba(255,255,255,0.5);margin-top:4px;position:relative;font-family:'Caveat',cursive;font-size:1.2rem}
.hero .badge{display:inline-block;background:rgba(255,255,255,0.08);padding:4px 14px;border-radius:20px;font-size:12px;color:var(--gold);margin-top:12px;position:relative;font-family:'Nunito'}

.container{max-width:920px;margin:0 auto;padding:24px 16px}
.card{background:#fff;border-radius:16px;padding:32px;margin-bottom:24px;box-shadow:0 4px 24px rgba(0,0,0,0.06);border:1px solid var(--bdr)}
.card h2{font-family:'Bitter',serif;color:var(--g);font-size:1.4rem;margin-bottom:6px}
.card .desc{color:var(--muted);font-size:0.9rem;margin-bottom:20px;line-height:1.7}

/* ══ CHALKBOARD ══ */
.chalkboard{
  background:var(--board);
  background-image:radial-gradient(ellipse at 30% 40%,rgba(60,100,60,0.4) 0%,transparent 70%),radial-gradient(ellipse at 70% 60%,rgba(40,80,40,0.3) 0%,transparent 70%);
  border-radius:16px;padding:32px 24px;margin:24px auto;max-width:580px;position:relative;
  box-shadow:inset 0 0 60px rgba(0,0,0,0.3),0 8px 32px rgba(0,0,0,0.3);
  border:8px solid #5a3a20;border-image:linear-gradient(135deg,#7a5030,#4a2a10,#6a4020,#3a1a08) 1;
}
.chalk-title{font-family:'Caveat',cursive;font-size:1.3rem;color:rgba(255,255,255,0.4);text-align:center;margin-bottom:20px;position:relative}

.board-container{position:relative;width:100%;max-width:480px;margin:0 auto;aspect-ratio:1}
.hash-lines{position:absolute;inset:0;pointer-events:none;z-index:2}
.hash-lines .hline{position:absolute;background:rgba(255,255,255,0.7);border-radius:3px}
.hash-lines .v1{width:6px;height:96%;top:2%;left:33%;transform:rotate(0.5deg)}
.hash-lines .v2{width:6px;height:96%;top:2%;left:66%;transform:rotate(-0.3deg)}
.hash-lines .h1{height:6px;width:96%;left:2%;top:33%;transform:rotate(-0.4deg)}
.hash-lines .h2{height:6px;width:96%;left:2%;top:66%;transform:rotate(0.2deg)}

.ttt-board{display:grid;grid-template-columns:1fr 1fr 1fr;grid-template-rows:1fr 1fr 1fr;position:absolute;inset:0;z-index:1}
.ttt-cell{position:relative;display:grid;grid-template-columns:1fr 1fr 1fr}
.ttt-cell .third{display:flex;align-items:center;justify-content:center;font-family:'Caveat',cursive;font-size:clamp(18px,4vw,26px);font-weight:700;color:var(--chalk);cursor:pointer;transition:all 0.15s;position:relative;border-right:1px dashed rgba(255,255,255,0.1)}
.ttt-cell .third:last-child{border-right:none}
.ttt-cell .third:hover{background:rgba(0,200,100,0.2);border-radius:4px}
.ttt-cell .third.empty-slot{color:rgba(255,255,255,0.1);cursor:default}
.ttt-cell .third.empty-slot:hover{background:none}
.ttt-cell .sec-num{position:absolute;bottom:2px;right:4px;font-family:'JetBrains Mono';font-size:8px;color:var(--gold);opacity:0.5;font-weight:400}
.ttt-cell .cell-num{position:absolute;top:2px;left:4px;font-family:'JetBrains Mono';font-size:8px;color:rgba(255,255,255,0.15);z-index:3}

/* ── ENCODER ── */
.encoder-input textarea{width:100%;padding:14px;border:2px solid var(--bdr);border-radius:10px;font-family:'Nunito';font-size:16px;resize:vertical;min-height:56px;transition:0.2s;margin-bottom:12px}
.encoder-input textarea:focus{outline:none;border-color:var(--g);box-shadow:0 0 0 3px rgba(0,119,72,0.12)}
.btn{padding:10px 20px;border:none;border-radius:10px;font-family:'Nunito';font-weight:700;font-size:14px;cursor:pointer;transition:0.2s}
.btn-g{background:var(--g);color:#fff}.btn-g:hover{background:var(--gd)}
.btn-o{background:none;border:2px solid var(--bdr);color:var(--soft)}.btn-o:hover{border-color:var(--g);color:var(--g)}
.btn-row{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:16px}
.output-area{background:#fdfcf7;border:2px dashed var(--bdr);border-radius:12px;padding:20px;min-height:80px;display:flex;flex-wrap:wrap;gap:6px;align-items:center}
.output-area.active{border-color:var(--g);border-style:solid}
.output-label{font-size:11px;color:var(--muted);font-weight:700;text-transform:uppercase;letter-spacing:1px;margin-bottom:6px}
.word-gap{width:24px;height:50px}
.placeholder{color:var(--bdr);font-size:14px;font-style:italic;width:100%;text-align:center;padding:20px}
.sym-wrap{text-align:center}
.sym-wrap .lbl{font-size:10px;color:var(--muted);margin-top:-2px}

.alpha-small{display:grid;grid-template-columns:repeat(auto-fill,minmax(58px,1fr));gap:5px;margin-top:16px}
.alpha-sm{background:var(--cream);border:1px solid var(--bdr);border-radius:8px;padding:5px 3px;text-align:center;cursor:pointer;transition:0.15s}
.alpha-sm:hover{border-color:var(--g);transform:translateY(-1px)}
.alpha-sm .l{font-weight:800;color:var(--g);font-size:13px}

.example{background:linear-gradient(135deg,#f8f0e0,var(--cream));border:1px solid #e0d4b8;border-radius:12px;padding:20px;margin:20px 0}
.example h3{color:#6b3a00;font-size:1rem;margin-bottom:8px}
.example-row{display:flex;gap:8px;flex-wrap:wrap;align-items:center;margin-top:12px}
.legend{background:var(--cream);border:1px solid var(--bdr);border-radius:10px;padding:16px;margin:16px 0;font-size:0.9rem;color:var(--soft);line-height:1.7}
.legend strong{color:var(--g)}

@media(max-width:550px){.hero h1{font-size:2.2rem}.chalkboard{padding:20px 12px}.ttt-cell .third{font-size:16px}}
</style>
</div>

<div class="container">

<div class="card">
  <h2>Comment ça marche?</h2>
  <p class="desc">On dessine une grille de tic-tac-toc (3×3 = 9 cases). Chaque case est <strong>divisée en 3 sections verticales</strong>. Les lettres remplissent les sections de gauche à droite, case par case : A B C dans la case 1, D E F dans la case 2, etc. La case 9 ne contient que Y et Z.<br><br>
  Le symbole = la <strong>forme de la case</strong> (ses bords dans la grille #) + un <strong>point positionné</strong> dans la bonne section (gauche, centre ou droite). C'est la <strong>position du point</strong> qui identifie la lettre!</p>

  <div class="legend">
    <strong>🔑 La position du point est la clé :</strong> Le point est placé à gauche (1re lettre), au centre (2e lettre), ou à droite (3e lettre) à l'intérieur de la forme de la case. Un point centré ne signifie PAS la même chose qu'un point à gauche!
  </div>

  <div class="chalkboard">
    <div class="chalk-title">✏️ Cliquez sur une lettre</div>
    <div class="board-container">
      <div class="hash-lines">
        <div class="hline v1"></div><div class="hline v2"></div>
        <div class="hline h1"></div><div class="hline h2"></div>
      </div>
      <div class="ttt-board" id="board"></div>
    </div>
  </div>

  <div class="example">
    <h3>📝 Exemple: MIEUX</h3>
    <p style="font-size:0.9rem;color:var(--soft)">M = case 5, point à gauche · I = case 3, point à droite · E = case 2, point au centre · U = case 7, point à droite · X = case 8, point à droite</p>
    <div class="example-row" id="exampleRow"></div>
  </div>
</div>

<div class="card">
  <h2>✏️ Créez votre message secret</h2>
  <p class="desc">Tapez du texte ou cliquez sur les lettres du tableau / alphabet ci-dessous.</p>
  <div class="encoder-input">
    <textarea id="inputText" placeholder="Tapez votre message ici..." oninput="encode()"></textarea>
  </div>
  <div class="btn-row">
    <button class="btn btn-g" onclick="encode()">Encoder</button>
    <button class="btn btn-o" onclick="clearAll()">Effacer</button>
    <button class="btn btn-o" onclick="downloadSVG()">📥 Télécharger SVG</button>
  </div>
  <div class="output-label">MESSAGE ENCODÉ</div>
  <div class="output-area" id="output"><div class="placeholder">Votre message apparaîtra ici en symboles...</div></div>
  <div style="margin-top:20px">
    <div class="output-label">CLIQUEZ POUR AJOUTER</div>
    <div class="alpha-small" id="alphaGrid"></div>
  </div>
</div>
</div>



<script>
const GRID=[['A','B','C'],['D','E','F'],['G','H','I'],['J','K','L'],['M','N','O'],['P','Q','R'],['S','T','U'],['V','W','X'],['Y','Z','']];
const L={};
GRID.forEach((cell,idx)=>{const row=Math.floor(idx/3),col=idx%3;cell.forEach((l,sec)=>{if(l)L[l]={row,col,section:sec,cellIdx:idx}})});

function getWalls(r,c){return{top:r>0,bottom:r<2,left:c>0,right:c<2}}

const SEC_LABELS=['gauche','centre','droite'];

function drawSymbol(letter,size){
  const info=L[letter.toUpperCase()];if(!info)return'';
  const s=size||48,m=4,sw=3,w=getWalls(info.row,info.col),stroke='#1a1a16';
  const ix=m,iy=m,iw=s-2*m,ih=s-2*m;
  // Dot position: section 0=left third, 1=center third, 2=right third
  const tw=iw/3;
  const dotX=ix+tw*info.section+tw/2; // center of the section
  const dotY=iy+ih/2; // vertically centered
  const dotR=Math.max(3,s*0.065);

  let d='';
  // Cell walls
  if(w.top)d+=`<line x1="${m}" y1="${m}" x2="${s-m}" y2="${m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if(w.bottom)d+=`<line x1="${m}" y1="${s-m}" x2="${s-m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if(w.left)d+=`<line x1="${m}" y1="${m}" x2="${m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  if(w.right)d+=`<line x1="${s-m}" y1="${m}" x2="${s-m}" y2="${s-m}" stroke="${stroke}" stroke-width="${sw}" stroke-linecap="round"/>`;
  // THE DOT — positioned in the correct section
  d+=`<circle cx="${dotX}" cy="${dotY}" r="${dotR}" fill="${stroke}"/>`;

  return`<svg width="${s}" height="${s}" viewBox="0 0 ${s} ${s}">${d}</svg>`;
}

function buildBoard(){
  const board=document.getElementById('board');
  GRID.forEach((cell,idx)=>{
    const div=document.createElement('div');div.className='ttt-cell';
    const cn=document.createElement('div');cn.className='cell-num';cn.textContent=idx+1;div.appendChild(cn);
    cell.forEach((letter,sec)=>{
      const t=document.createElement('div');
      t.className='third'+(letter?'':' empty-slot');
      t.textContent=letter||'';
      const sn=document.createElement('span');sn.className='sec-num';sn.textContent='·';t.appendChild(sn);
      if(letter){t.onclick=()=>addLetter(letter);t.title=`${letter} → case ${idx+1}, point ${SEC_LABELS[sec]}`}
      div.appendChild(t);
    });
    board.appendChild(div);
  });
}

function buildAlphaGrid(){
  const grid=document.getElementById('alphaGrid');
  for(let i=65;i<=90;i++){
    const ch=String.fromCharCode(i);
    const c=document.createElement('div');c.className='alpha-sm';
    c.innerHTML=`<div class="l">${ch}</div>${drawSymbol(ch,28)}`;
    c.onclick=()=>addLetter(ch);grid.appendChild(c);
  }
  const sp=document.createElement('div');sp.className='alpha-sm';sp.style.background='#eee';
  sp.innerHTML='<div class="l" style="font-size:10px">ESP</div>';
  sp.onclick=()=>{document.getElementById('inputText').value+=' ';encode()};grid.appendChild(sp);
}

function addLetter(ch){document.getElementById('inputText').value+=ch;encode()}

function encode(){
  const input=document.getElementById('inputText').value.toUpperCase(),o=document.getElementById('output');
  if(!input.trim()){o.innerHTML='<div class="placeholder">Votre message apparaîtra ici en symboles...</div>';o.classList.remove('active');return}
  o.classList.add('active');let html='';
  for(const ch of input){
    if(ch===' ')html+='<div class="word-gap"></div>';
    else{const svg=drawSymbol(ch,50);if(svg)html+=`<div class="sym-wrap">${svg}<div class="lbl">${ch}</div></div>`}
  }
  o.innerHTML=html;
}

function clearAll(){document.getElementById('inputText').value='';const o=document.getElementById('output');o.innerHTML='<div class="placeholder">Votre message apparaîtra ici en symboles...</div>';o.classList.remove('active')}

function downloadSVG(){
  const svgs=document.getElementById('output').querySelectorAll('svg');if(!svgs.length)return;
  const gap=56,W=svgs.length*gap+20;let inner='',x=10;
  svgs.forEach(svg=>{inner+=`<g transform="translate(${x},10)">${svg.innerHTML}</g>`;x+=gap});
  const a=document.createElement('a');a.href=URL.createObjectURL(new Blob([`<svg xmlns="http://www.w3.org/2000/svg" width="${W}" height="70" viewBox="0 0 ${W} 70">${inner}</svg>`],{type:'image/svg+xml'}));a.download='message-tictactoc.svg';a.click();
}

function buildExample(){
  const row=document.getElementById('exampleRow');
  'MIEUX'.split('').forEach(ch=>{
    const info=L[ch];
    row.innerHTML+=`<div class="sym-wrap">${drawSymbol(ch,54)}<div style="font-size:12px;color:var(--muted);font-weight:700">${ch}</div><div style="font-size:9px;color:var(--gold)">case ${info.cellIdx+1}, pt ${SEC_LABELS[info.section]}</div></div>`;
  });
}

buildBoard();buildAlphaGrid();buildExample();
</script>