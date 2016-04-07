(function($) {
    $.fn.orgChart = function(options) {
        var opts = $.extend({}, $.fn.orgChart.defaults, options);
        return new OrgChart($(this), opts);        
    }

    $.fn.orgChart.defaults = {
        data: [{id:1, name:'Root', parent: 0}],
        showControls: false,
        allowEdit: false,
        onAddNode: null,
        onDeleteNode: null,
        onClickNode: null,
        newNodeText: 'Add Child'
    };

    function OrgChart($container, opts){
        var data = opts.data;
        var nodes = {};
        var rootNodes = [];
        this.opts = opts;
        this.$container = $container;
        var self = this;

        this.draw = function(){
            $container.empty().append(rootNodes[0].render(opts));
            $container.find('.node').click(function(){
                if(self.opts.onClickNode !== null){
                    self.opts.onClickNode(nodes[$(this).attr('node-id')]);
                }
            });

            if(opts.allowEdit){
                $container.find('.node h2').click(function(e){
                    var thisId = $(this).parent().attr('node-id');
                    self.startEdit(thisId,0);
                    e.stopPropagation();
                });
                $container.find('.node p').click(function(e){
                    var thisId = $(this).parent().attr('node-id');
                    self.startEditPos(thisId,0);
                    e.stopPropagation();
                });
            }

            // add "add button" listener
            $container.find('.org-add-button').click(function(e){
                var thisId = $(this).parent().attr('node-id');

                if(self.opts.onAddNode !== null){
                    self.opts.onAddNode(nodes[thisId]);
                }
                else{
                    self.newNode(thisId);
                }
                e.stopPropagation();
            });

            $container.find('.org-del-button').click(function(e){
                var thisId = $(this).parent().attr('node-id');

                if(self.opts.onDeleteNode !== null){
                    self.opts.onDeleteNode(nodes[thisId]);
                }
                else{
                    self.deleteNode(thisId);
                }
                e.stopPropagation();
            });
        }
        this.startEditPos = function(id){
         var inputElement = $('<input class="org-input form-control" type="text" value="'+nodes[id].data.position+'"/>');
         $container.find('div[node-id='+id+'] p').replaceWith(inputElement);
         var commitChange = function(){
            var h2Element = $('<p>'+nodes[id].data.position+'</p>');
            if(opts.allowEdit){
                h2Element.click(function(){
                    self.startEditPos(id,0);
                })
            }
            inputElement.replaceWith(h2Element);
        }  
        inputElement.focus();
        inputElement.change(function(event){
            if(event.which == 13){
                commitChange();
            }else{

                nodes[id].data.position = inputElement.val();
            }
        });
        inputElement.blur(function(event){
            commitChange();
        })
    }

    this.startEdit = function(id,parent){
     var bsda = '';
     var getUrl = window.location;
     var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
     $.ajax({
        type:'POST',
        url: baseUrl+'/index.php/dm/personnel/getAllPersonel',
        data: '',
        success: function(daddta){
           var aa = JSON.parse(daddta);

           for (var i = 0; i<aa.length; i++) {
                   // console.log(aa[i].name);
                   bsda =  bsda + '<option value="'+aa[i].id+'-'+aa[i].name+'">'+aa[i].name+'</option> ';
               };
               startEditForm(bsda,id,parent);

           }
       });
 }
 function startEditForm(bsda,id,parent){
    var bsd = '<select style="margin-top: 5%;margin-bottom: 8%;" class="org-input form-control"><option value="">-- Pilih Personnel --</option> '+ bsda + '</select>';
    var bsd2 = '<input class="org-input form-control" type="text" placeholder="Fungsi / Position" />';
    var inputElement = $(bsd);
    var inputElements = $(bsd2);
    $container.find('div[node-id='+id+'] h2').replaceWith(inputElement);
    $container.find('div[node-id='+id+'] p').replaceWith(inputElements);
    var commitChange = function(){
        var h2Element = $('<h2><b>'+nodes[id].data.name+'</b></h2>');
        var h2Elements = $('<p>'+nodes[id].data.position+'</p>');
        var idStrs = inputElement.val();
        var idStrs2 = idStrs.split('-');
        // alert(idStrs2[0]+'/'+inputElements.val()+'/'+parent);
        var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            type:'POST',
            url: baseUrl+'/index.php/sales/jobdesc/addPosition',
            data: 'id='+idStrs2[0]+'&pos='+inputElements.val()+'&par='+parent,
            success: function(ds){
                alert('Data di Tambah');
            }
        });
        if(opts.allowEdit){
            h2Element.click(function(){
                self.startEdit(id,parent);
            })
        }
        inputElement.replaceWith(h2Element);
        inputElements.replaceWith(h2Elements);
    }  
    inputElement.focus();
    inputElements.keyup(function(event){
        if(event.which == 13){
            if(inputElement.val()!='' && inputElements.val()!=''){
                commitChange();
            }
        }else{
            var nmStr = inputElement.val();
            var nmStr2 = nmStr.split('-');
            nodes[id].data.name = nmStr2[1];
            nodes[id].data.position = inputElements.val();
        }
    });
        //  inputElements.key(function(event){
        //     if(event.which == 13){
        //         commitChange();
        //     }else{
        //         nodes[id].data.position = inputElements.val();
        //     }
        // });
        // inputElement.blur(function(event){
        //     commitChange();
        // });
inputElements.blur(function(event){
 if(inputElement.val()!='' && inputElements.val()!=''){
    commitChange();
}
});

}

this.newNode = function(parentId){
    var nextId = Object.keys(nodes).length;
    while(nextId in nodes){
        nextId++;
    }

    self.addNode({id: nextId, name: '', parent: parentId});
}

this.addNode = function(data){
    var newNode = new Node(data);
    nodes[data.id] = newNode;
    nodes[data.parent].addChild(newNode);

    self.draw();
    self.startEdit(data.id,data.parent);
}

this.deleteNode = function(id){
    for(var i=0;i<nodes[id].children.length;i++){
        self.deleteNode(nodes[id].children[i].data.id);
    }
    nodes[nodes[id].data.parent].removeChild(id);
    delete nodes[id];
    self.draw();
}

this.getData = function(){
    var outData = [];
    for(var i in nodes){
        outData.push(nodes[i].data);
    }
    return outData;
}

        // constructor
        for(var i in data){
            var node = new Node(data[i]);
            nodes[data[i].id] = node;
        }

        // generate parent child tree
        for(var i in nodes){
            if(nodes[i].data.parent == 0){
                rootNodes.push(nodes[i]);
            }
            else{
                nodes[nodes[i].data.parent].addChild(nodes[i]);
            }
        }

        // draw org chart
        $container.addClass('orgChart');
        self.draw();
    }

    function Node(data){
        this.data = data;
        this.children = [];
        var self = this;

        this.addChild = function(childNode){
            this.children.push(childNode);
        }

        this.removeChild = function(id){
            for(var i=0;i<self.children.length;i++){
                if(self.children[i].data.id == id){
                     var getUrl = window.location;
        var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $.ajax({
            type:'POST',
            url: baseUrl+'/index.php/sales/jobdesc/deletePosition',
            data: 'id='+id,
            success: function(ds){
                // alert(ds);
            }
        });
                    self.children.splice(i,1);
                    return;
                }
            }
        }

        this.render = function(opts){
            var childLength = self.children.length,
            mainTable;

            mainTable = "<table cellpadding='0' cellspacing='0' border='0'>";
            var nodeColspan = childLength>0?2*childLength:2;
            mainTable += "<tr><td colspan='"+nodeColspan+"'>"+self.formatNode(opts)+"</td></tr>";

            if(childLength > 0){
                var downLineTable = "<table cellpadding='0' cellspacing='0' border='0'><tr class='lines x'><td class='line left half'></td><td class='line right half'></td></table>";
                mainTable += "<tr class='lines'><td colspan='"+childLength*2+"'>"+downLineTable+'</td></tr>';

                var linesCols = '';
                for(var i=0;i<childLength;i++){
                    if(childLength==1){
                        linesCols += "<td class='line left half'></td>";    // keep vertical lines aligned if there's only 1 child
                    }
                    else if(i==0){
                        linesCols += "<td class='line left'></td>";     // the first cell doesn't have a line in the top
                    }
                    else{
                        linesCols += "<td class='line left top'></td>";
                    }

                    if(childLength==1){
                        linesCols += "<td class='line right half'></td>";
                    }
                    else if(i==childLength-1){
                        linesCols += "<td class='line right'></td>";
                    }
                    else{
                        linesCols += "<td class='line right top'></td>";
                    }
                }
                mainTable += "<tr class='lines v'>"+linesCols+"</tr>";

                mainTable += "<tr>";
                for(var i in self.children){
                    mainTable += "<td colspan='2'>"+self.children[i].render(opts)+"</td>";
                }
                mainTable += "</tr>";
            }
            mainTable += '</table>';
            return mainTable;
        }

        this.formatNode = function(opts){
            var nameString = '',
            descString = '';
            if(typeof data.name !== 'undefined'){
                nameString = '<h2><b>'+self.data.name+'</b></h2>';
            }else{
                nameString =  '<h2><b> - </b></h2>';
            }
            if(typeof data.position !== 'undefined'){
                descString = '<p>'+self.data.position+'</p>';
            }else{
              descString = '<p> - </p>';
          }
          if(opts.showControls){
            var buttonsHtml = "<div class='org-add-button'></div><div class='org-del-button'></div>";
        }
        else{
            buttonsHtml = '';
        }
        return "<div class='node' style='height:auto;' node-id='"+this.data.id+"'>"+nameString+descString+buttonsHtml+"</div>";
    }
}

})(jQuery);

