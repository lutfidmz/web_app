

// app.js
// const dirTree = directoryTree();
const trees = Object.entries(directoryTree("../images/").children);
const dirs = trees.map(element => element[1]).filter(val => val.type == 'directory')

const cBox = (element) =>{ return(
`<div class="c-box">
    ${element}
</div>`)}

const franco = (link, group, description, path)=>{ return(
`<a href="${link}"
    class="fresco"
    data-fresco-group="${group}"
    data-fresco-caption="${description}"><img src="${path}" /></a>
`
)}

const dir = dirs.map(({path, name,type, children}) => ({path, dirName: name,type, children}))

function getFranco() { 
    let francos = ""
    dir.map(({dirName, children})=>{
    let elFranco = ""

    children.map((v, i)=>{
        v.children.map(x=>{
            elFranco += franco(x.path.replace('../',''), v.name, '', x.path.replace('../',''))
        })
    })
    
    francos += cBox(elFranco)
    })

    return francos
}
