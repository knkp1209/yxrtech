function changeimg(id, img) {
    document.getElementById("myImage" + id).src = img;
}

function sourceimg(id, img) {
    document.getElementById("myImage" + id).src = img;
}

function delimg(i) {
    var parent = document.getElementById('oldimgdy' + i);
    var imgchild = document.getElementById('vi' + i);
    var bnchild = document.getElementById('bn' + i);
    var valchild = document.getElementById('val' + i);
    parent.removeChild(imgchild);
    parent.removeChild(bnchild);
    parent.removeChild(valchild);
}

function addPic1() {
    var addBtn = document.getElementById('addBtn');
    var input = document.createElement('input');
    input.type = 'file';
    input.name = 'imagefile[]';
    var picInput = document.getElementById('picInput');
    picInput.appendChild(input);
    if (picInput.children.length == 10) {
        addBtn.disabled = 'disabled';
    }
}


function check_all(obj, cName) {
    var checkboxs = document.getElementsByName(cName);
    for (var i = 0; i < checkboxs.length; i++) { checkboxs[i].checked = obj.checked; }
}


function checkadminName() {
    var name = document.getElementsByName('adminname')[0]; //在这里我认为： name 代表的name 为 txtUser 的文本框 
    if (name.value.length == 0) {
        alert("请输入用户名");
        name.focus();
        return false;
    } else {
        return true;
    }
}


function checkpassword() {
    var name = document.getElementsByName('pass')[0]; //在这里我认为： name 代表的name 为 txtUser 的文本框 
    if (name.value.length == 0) {
        alert("请输入密码");
        name.focus();
        return false;
    } else {
        return true;
    }
}


function checkform() {
    if (checkadminName() && checkpassword())
        return true;
    else
        return false;
}




function addcase() {
    var addBtn = document.getElementById('addBtn');

    var hr = document.createElement('hr');

    var img = document.createElement('input');
    var codeimg = document.createElement('input');
    var title = document.createElement('input');
    var subtitle = document.createElement('input');

    img.type = 'file';
    img.name = 'imagefile[]';
    img.className = 'forminline';

    codeimg.type = 'file';
    codeimg.name = 'codeimagefile[]';
    codeimg.className = 'forminline';

    title.type = 'text';
    title.name = 'title[]';
    title.className = 'forminline';

    subtitle.type = 'text';
    subtitle.name = 'subtitle[]';
    subtitle.className = 'forminline';

    var labelimg = document.createElement('label');
    labelimg.innerHTML = '小程序图片：';

    var labelcodeimg = document.createElement('label');
    labelcodeimg.innerHTML = '二维码图片：';

    var labeltitle = document.createElement('label');
    labeltitle.innerHTML = '正标题：';

    var labelsubtitle = document.createElement('label');
    labelsubtitle.innerHTML = '副标题：';

    var picInput = document.getElementById('picInput');
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    var p3 = document.createElement('p');
    var p4 = document.createElement('p');

    picInput.appendChild(hr);
    picInput.appendChild(p1);
    picInput.appendChild(p1).appendChild(labelimg);
    picInput.appendChild(p1).appendChild(img);

    picInput.appendChild(p2);
    picInput.appendChild(p2).appendChild(labelcodeimg);
    picInput.appendChild(p2).appendChild(codeimg);

    picInput.appendChild(p3);
    picInput.appendChild(p3).appendChild(labeltitle);
    picInput.appendChild(p3).appendChild(title);

    picInput.appendChild(p4);
    picInput.appendChild(p4).appendChild(labelsubtitle);
    picInput.appendChild(p4).appendChild(subtitle);
}


function addpeople() {
    var addBtn = document.getElementById('addBtn');

    var hr = document.createElement('hr');

    var img = document.createElement('input');
    var name = document.createElement('input');
    var profile = document.createElement('input');
   
    img.type = 'file';
    img.name = 'imagefile[]';
    img.className = 'forminline';


    name.type = 'text';
    name.name = 'name[]';
    name.className = 'forminline';

    profile.type = 'text';
    profile.name = 'profile[]';
    profile.className = 'forminline';

    var labelimg = document.createElement('label');
    labelimg.innerHTML = '头像：';


    var labeltitle = document.createElement('label');
    labeltitle.innerHTML = '姓名：';

    var labelsubtitle = document.createElement('label');
    labelsubtitle.innerHTML = '介绍：';

    var picInput = document.getElementById('picInput');
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    var p3 = document.createElement('p');

    picInput.appendChild(hr);
    picInput.appendChild(p1);

    picInput.appendChild(p1).appendChild(labelimg);
    picInput.appendChild(p1).appendChild(img);



    picInput.appendChild(p2).appendChild(labeltitle);
    picInput.appendChild(p2).appendChild(name);

    picInput.appendChild(p3).appendChild(labelsubtitle);
    picInput.appendChild(p3).appendChild(profile);
}

function addcompany() {
     var addBtn = document.getElementById('addBtn');

    var hr = document.createElement('hr');

    var img = document.createElement('input');
    var companynames = document.createElement('input');
   
    img.type = 'file';
    img.name = 'imagefile[]';
    img.className = 'forminline';


    companynames.type = 'text';
    companynames.name = 'companynames[]';
    companynames.className = 'forminline';


    var labelimg = document.createElement('label');
    labelimg.innerHTML = '公司图标：';


    var labelcompanyname = document.createElement('label');
    labelcompanyname.innerHTML = '公司名称：';


    var picInput = document.getElementById('picInput');
    var p1 = document.createElement('p');
    var p2 = document.createElement('p');
    picInput.appendChild(p1);
    picInput.appendChild(p2);

    picInput.appendChild(hr);
    picInput.appendChild(p1).appendChild(labelimg);
    picInput.appendChild(p1).appendChild(img);



    picInput.appendChild(p2).appendChild(labelcompanyname);
    picInput.appendChild(p2).appendChild(companynames);

}

function getElements()
{
  var x=document.getElementsByTagName("input");
  for (var i=0; i<x.length; i++){
      if (x[i].value == "") {
        alert('请将表单填写完成');
        return false;// 有空值
      }
  }
}