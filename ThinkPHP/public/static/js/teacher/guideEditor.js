    function checkSubmit()
    {
        $checkGuideName = checkGuideName();
        $checkCourse = checkCourse();
        $checkTxtContent = checkTxtContent();

        return $checkGuideName && $checkCourse && $checkTxtContent;
    }

    function checkCourse() {
        $courseNo = $("#courseNo").val();

        if ($courseNo == -1) {
            alert("未选择实验课程");
            return false;
        }
        else {
            return true;
        }
    }

    function checkGuideName() {
        $guideName = $("#guideName").val();

        if ($guideName == "") {
            alert("实验指导名称不能为空！");
            return false;
        }
        else {
            return true;
        }
    }

    function checkTxtContent() {
        $txtContent = $("#txtContent").val();

        if ($txtContent == "") {
            alert("实验指导内容不能为空！");
            return false;
        }
        else {
            return true;
        }
    }