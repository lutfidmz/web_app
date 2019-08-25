var _getAllFilesFromFolder = function(dir) {

    var filesystem = require("fs");
    var results = [];

    filesystem.readdirSync(dir).forEach(function(file) {

        file = dir+'/'+file;
        var stat = filesystem.statSync(file);

        if (stat && stat.isDirectory()) {
            results = results.concat(_getAllFilesFromFolder(file))
        } else results.push(file.replace('../', ''));

    });

    return results;

};


const cBox = (element) =>{ return(
`<div class="c-box">
    ${element}</div>
`)}

const franco = (link, group, description, path)=>{ return(
`<a href="${link}"
    class="fresco"
    data-fresco-group="${group}"
    data-fresco-caption="${description}"><img src="${path}" /></a>
`)}

const imagesDir = _getAllFilesFromFolder("../images")

const groupDir = (cat, act) =>{
    return imagesDir.filter(e=> {
        return (e.replace('images/','').split('/')[0] == cat && e.replace('images/','').split('/')[1] == act)
    })
}

const getElement = (konfig, group) => {
    let outter = ''
    let inner = ''
    konfig.map(e => {
        groupDir(group, e).map(f=>{
            inner += franco(f, f.split('/')[2], f.split('/')[3].split('.')[0], f)
        })
        outter += cBox(inner)
    })

    return outter
}

const kbmConfig = ['debat', 'presentasi']
// console.log(getElement(kbmConfig, 'kbm'))

const ekskulConfig = ['futsal', 'panahan']
// console.log(getElement(ekskulConfig, 'ekskul'))