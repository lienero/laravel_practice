// 중복 검사를 위한 checkid() 함수 생성
function checkid() {
  // document.getElementById("uid").value; : 이 문서에 있는 uid(id이름) 값의 안에 있는 값을 가져옴
  var userid = document.getElementById("uid").value;
  if (userid) {
    // userid 값이 존재할 시
    // "check.php?userid="+userid; 로 이동
    url = "check.php?userid=" + userid;
    // window.open('새창에 불러올 문서','새창이름','새창속성') : 새창을 열어주는 함수
    window.open(url, "chkid", "width=300,height=100");
  } else {
    alert("IDを入力してください");
  }
}

// 비밀번호 조합(보안) 검사를 위한 safetyPasswordPattern(str) 함수 생성
function safetyPasswordPattern(str) {
  var pass = str.value;
  var message = "";
  var color = "";
  var checkPoint = 0;

  // 입력값이 있을경우에만 실행
  if (pass.length) {
    // 최대 입력 글자수를 제한한다.
    // .length 변수의 길이를 알아내는 함수
    // .length의 길이를
    if (pass.length < 8 || pass.length > 16) {
      message = ":: 8の字以上, 16の字以下 ::";
      color = "#A23E48";
    }

    // 문자열의 길이가 8 ~ 16 인경우
    else {
      // 비밀번호 문자열에 숫자 존재 여부 검사
      // test(str): 매개변수에 문자열을 받아와서 패턴과 일치하는지 확인
      var pattern1 = /[0-9]/; // 숫자의 정규식/[0-9]/ == >= 0 && <= 9
      if (pattern1.test(pass) == false) {
        //일치하지 않을 경우에 checkPoint 변수에 1을 더한다
        checkPoint = checkPoint + 1;
      }

      // 비밀번호 문자열에 영문 소문자 존재 여부 검사
      var pattern2 = /[a-z]/; // a~z사이
      if (pattern2.test(pass) == false) {
        checkPoint = checkPoint + 1;
      }

      // 비밀번호 문자열에 영문 대문자 존재 여부 검사
      var pattern3 = /[A-Z]/; // 대문자 A~Z 사이
      if (pattern3.test(pass) == false) {
        checkPoint = checkPoint + 1;
      }

      // 비밀번호 문자열에 특수문자 존재 여부 검사
      var pattern4 = /[~!@#$%^&*()_+|<>?:{}]/; // 특수문자 중 하나
      if (pattern4.test(pass) == false) {
        checkPoint = checkPoint + 1;
      }

      if (checkPoint >= 3) {
        message = ":: セキュリティ性の脆弱なパスワード ::";
        color = "#A23E48";
      } else if (checkPoint == 2) {
        message = ":: セキュリティ性の低いパスワード ::";
        color = "#FF8C42";
      } else if (checkPoint == 1) {
        message = ":: セキュリティ性のあるパスワード ::";
        color = "#FF8C42";
      } else {
        message = ":: セキュリティ性の高いパスワード ::";
        color = "#0000CD";
      }
    }
  } else {
    message = ":: パスワードをご入力ください ::";
    color = "#000000";
  }
  // document : HTML 문서
  // getElementById('makyText')는 아이디가 'makyText'인 HTML 요소를 갖고 와라.
  // innerHTML은 내부 HTML의 내부 코드를 JavaScript 코드에서 변경할 수 있게 함(특정 내용의 삽입)
  // id : makyText을 매개체로 비밀번호 입력 밑에서 비밀번호의 보안 메세지를 출력함
  document.getElementById("makyText").innerHTML = message;
  document.getElementById("makyText").style.color = color;
}

// 비밀번호 재입력 일치여부 확인
function isSame() {
  if (
    document.getElementById("pw").value != "" &&
    document.getElementById("pwcheck").value != ""
  ) {
    if (
      document.getElementById("pw").value == document.getElementById("pwcheck").value
    ) {
      // id : same을 매개체로 비밀번호 확인 밑에서 비밀번호의 확인 메세지를 출력함
      document.getElementById("same").innerHTML = "パスワードが一致しています";
      document.getElementById("same").style.color = "blue";
    } else {
      document.getElementById("same").innerHTML = "パスワードが一致していません";
      document.getElementById("same").style.color = "red";
    }
  }
}
