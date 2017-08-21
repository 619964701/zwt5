	function goPage(pno,psize,fenye,yid){
   	var id = 0; 
       $("."+fenye).each(function(){
       id +=1;
              
      })
      var num = id;
    console.log(num);
    var totalPage = 0;//总页数
    var pageSize = psize;//每页显示行数
    //总共分几页 
    if(num/pageSize > parseInt(num/pageSize)){   
            totalPage=parseInt(num/pageSize)+1;   
       }else{   
           totalPage=parseInt(num/pageSize);   
       }   
    var currentPage = pno;//当前页数
    var startRow = (currentPage - 1) * pageSize+1;//开始显示的行  31 
       var endRow = currentPage*pageSize;//结束显示的行   40
       endRow = (endRow > num)? num : endRow;    //40
       console.log(endRow);
       //遍历显示数据实现分页
    for(var i=1;i<(num+1);i++){    
        var irow = $("."+fenye)[i-1];
        if(i>=startRow && i<=endRow){
            irow.style.display = "";
           
            
        }else{
            irow.style.display = "none";
           
        }
    }
    var tempStr = "共"+num+"条记录 共"+totalPage+"页 &nbsp;&nbsp;&nbsp;当前第"+currentPage+"页";
    if(currentPage>1){
        tempStr += "<a href=\"#\" onClick=\"goPage("+(1)+","+psize+",'"+fenye+"','"+yid+"')\">&nbsp;&nbsp;&nbsp;首页</a>";
        tempStr += "<a href=\"#\" onClick=\"goPage("+(currentPage-1)+","+psize+",'"+fenye+"','"+yid+"')\">&nbsp;&nbsp;&nbsp;上一页</a>"
    }else{
        tempStr += "&nbsp;&nbsp;&nbsp;首页";
        tempStr += "&nbsp;&nbsp;&nbsp;上一页&nbsp;&nbsp;";    
    }

    if(currentPage<totalPage){

        tempStr += "<a href=\"#\" onClick=\"goPage("+(currentPage+1)+","+psize+",'"+fenye+"','"+yid+"')\">&nbsp;&nbsp;&nbsp;下一页</a>";
        tempStr += "<a href=\"#\" onClick=\"goPage("+(totalPage)+","+psize+",'"+fenye+"','"+yid+"')\">&nbsp;&nbsp;&nbsp;尾页</a>";
        
    }else{
        tempStr += "&nbsp;&nbsp;&nbsp;下一页";
        tempStr += "&nbsp;&nbsp;尾页";    
    }

    document.getElementById(yid).innerHTML = tempStr;
    
}