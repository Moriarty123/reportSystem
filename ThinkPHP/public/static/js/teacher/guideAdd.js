//一般情况下，onblur事件只在input等元素中才有，而div却没有，因为div没有tabindex属性，所以要给div加上此属性。定义tabindex属性后，元素是默认会加上焦点虚线的，那么在IE中可以通过hidefocus="true"去除！其他浏览器通过outline=0进行去除！
$(document).ready(function(){
    $(".w-e-text").attr('tabindex',0);
    $(".w-e-text").attr('hidefocus','true');
    $(".w-e-text").css('outline',0);
});

//提交校验
function checkSubmit() {

    // //判断保存或提交
    // $submit = 
    // if (true) {}
    //
    if(
        checkCourse() == true &&
        checkName() == true && 
        checkAim() == true && 
        checkEnvironment() == true && 
        checkRequest() == true && 
        checkTask() == true && 
        checkContent() == true
         ) {
        // alert('确认提交？');
        return true;
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

    if ($courseNo == 'null') {
        alert("未选择实验课程");
        return false;
    }
    else {
        return true;
    }
}


//实验目的校验
function checkAim() {
    $testAimText = $("#testAim .w-e-text").html();

    if ($testAimText == "<p><br></p>") {
       alert('实验目的不能为空');
       return false;
    }
    else {
        $('#aim').val($testAimText);
        return true;
    }
}

//实验环境校验
function checkEnvironment() {
    $testEnvironmentText = $("#testEnvironment .w-e-text").html();

    if ($testEnvironmentText == "<p><br></p>") {
       alert('实验环境不能为空');
       return false;
    }
    else {
        $('#environment').val($testEnvironmentText);
        return true;
    }
}

//实验要求校验
function checkRequest() {
    $testRequireText = $("#testRequire .w-e-text").html();

    if ($testRequireText == "<p><br></p>") {
       alert('实验要求不能为空');
       return false;
    }
    else {
        $('#request').val($testRequireText);
        return true;
    }
}

//实验任务校验
function checkTask() {
    $testTaskText = $("#testTask .w-e-text").html();

    if ($testTaskText == "<p><br></p>") {
       alert('实验任务不能为空');
       return false;
    }
    else {
        $('#task').val($testTaskText);
        return true;
    }
}

//实验内容校验
function checkContent() {
    $testContentText = $("#testContent .w-e-text").html();

    if ($testContentText == "<p><br></p>") {
       alert('实验内容不能为空');
       return false;
    }
    else {
        $('#content').val($testContentText);
        return true;
    }
}