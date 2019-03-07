//一般情况下，onblur事件只在input等元素中才有，而div却没有，因为div没有tabindex属性，所以要给div加上此属性。定义tabindex属性后，元素是默认会加上焦点虚线的，那么在IE中可以通过hidefocus="true"去除！其他浏览器通过outline=0进行去除！
$(document).ready(function(){
    $(".w-e-text").attr('tabindex',0);
    $(".w-e-text").attr('hidefocus','true');
    $(".w-e-text").css('outline',0);
});

//提交校验
function checkSubmit() {

    //判断保存或提交

    if(
        checkCourse() == true &&
        checkName() == true && 
        checkFile() == true
         ) {
        // alert('确认提交？');
        return window.confirm("确认提交？");
    }
    else {
        return false;
    }
}

//名称校验
function checkName() {
    $guideName = $("#guideName").val();

    if($guideName == "") {
        alert("实验指导名称不能为空");
        return false;
    }
    else {
        return true;
    }
}

//课程校验
function checkCourse() {
    $courseNo = $('#courseNo').val();

    if ($courseNo == '-1') {
        alert("未选择实验课程");
        return false;
    }
    else {
        return true;
    }
}

function checkFile() {
    $file = $('#file').val();
    // alert($file);

    if ($file == "") {
        alert("未选择实验指导（pdf格式）");
        return false;
    }
    else {
        return true;
    }
    
}

