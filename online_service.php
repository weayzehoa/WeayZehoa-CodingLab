<div class="myheadbg text-white container col-8 text-shadow-bu1 text-center">
        <h4>無會員登入線上客服系統. (此功能測試時必須搭配後台使用)</h4>
</div>

<div class="container col-8 myconbg">
    <div class="row">
        <div class="col-12">
            <div class="bg-white text-dark mycol vh-80">
                <br>
                    <p>
                    說明：線上客服系統, 程式採用JQuery方式. <br>
                    1. 當按下客服按鈕, 該按鈕會消失, 對話框從右邊滑入.<br>
                    2. 資料庫會建立一筆服務索引(案件編號), 並顯示在後台客服系統頁面上, 通知客服人員.<br>
                    3. 輸入資料後, 會將該資料顯示在對話框中, 並等待客服回覆.<br>
                    4. 當客服回覆後, 對話框中會顯示出該回覆資料.<br>
                    5. 按下結束按鈕, 該對話將會結束, 並清除所有紀錄, 無法再繼續, 除非重新再開一次客服.<br>
                    6. 對話框每三秒更新一次.<br>
                    </p>
            </div>
        </div>
    </div>
</div>

    <button id="ols_btn"></button>
    <div id="ols_talk_back_hidden">
    <div id="ols_talk_back">
        <div id="ols_talk_talk">
            <div id="ols_t_case">案件編號</div>
            <div id="ols_t_talk_back">
                <div id="ols_t_talk">對話內容</div>
            </div>
        </div>
        <div id="ols_talk_me">
            <div id="ols_t_input">
                <textarea id="ols_t_in"></textarea>
            </div>
            <div id="ols_t_btn">
                <div id="ols_btn_talk1">送出</div>
                <div id="ols_btn_talk2">結束</div>
            </div>
        </div>
    </div>
    </div>

    <div id="ols_service">
        <div id="ols_con1">
                <div id="ols_close">關閉</div>
        </div>
        <div id="ols_con2"></div>
    </div>
