<style>
    .quiz-action-section button{
        margin: 0 10px 10px 0
    }
    .question-editor{
        width: 95%;
        border: 2px solid #dcdcdc;
        margin: 0 auto;
    }
    .question-editor h1 {
        text-align: center;
        color: #dcdcdc;
        font-size: 18px;

    }
    #number-holder {
        margin-bottom: 6px !important 
    }
    .quiz-right.fixed{
        margin-top: 20px
    }


    body.dragging, body.dragging * {
        cursor: move !important;
    }

    .dragged {
        position: absolute;
        opacity: 0.5;
        z-index: 2000;
    }

    @media(min-width: 992px){
        .fixed {
            position: fixed; 
            top: 0; 
            height: 70px; 
            z-index: 1;
        }
    }
    ol.question-editor-inner li.placeholder {
        position: relative;
    /** More li styles **/
    }
    ol.question-editor-inner li.placeholder:before {
    position: absolute;
    /** Define arrowhead **/
    }
    ol, ol li {
        margin: 0; padding: 0
    }
    ol li {
        list-style-type: none;
        border: 2px dashed #dcdcdc;
        padding: 10px;
        margin-top: 10px
    }
    .edu-loading.m-loading{
        position: fixed;
        height: 2px;
        top: 0;
        left: 0;
        right: 0;
        z-index: 20;
        animation: loadOn ease 1500ms;
        z-index: 30000;
        background:gold
    }



    @keyframes  loadOn {
        0%{
            width: 0%;
        }
        100%{
            width: 100%;
        }
    }
    .rotated {
        -webkit-transform: rotate(180deg);  /* Chrome, Safari 3.1+ */
        -moz-transform: rotate(180deg);  /* Firefox 3.5-15 */
        -ms-transform: rotate(180deg);  /* IE 9 */
        -o-transform: rotate(180deg);  /* Opera 10.50-12.00 */
        transform: rotate(180deg);  /* Firefox 16+, IE 10+, Opera 12.10+ */
    }
    .points{
        max-width: 100px
    }
    .panel-title{
        margin-bottom: 10px
    }
</style>