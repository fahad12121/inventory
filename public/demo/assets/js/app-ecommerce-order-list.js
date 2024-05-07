"use strict";$((function(){let e,t,a;isDarkStyle?(e=config.colors_dark.borderColor,t=config.colors_dark.bodyBg,a=config.colors_dark.headingColor):(e=config.colors.borderColor,t=config.colors.bodyBg,a=config.colors.headingColor);var s=$(".datatables-order"),n={1:{title:"Dispatched",class:"bg-label-warning"},2:{title:"Delivered",class:"bg-label-success"},3:{title:"Out for Delivery",class:"bg-label-primary"},4:{title:"Ready to Pickup",class:"bg-label-info"}},r={1:{title:"Paid",class:"text-success"},2:{title:"Pending",class:"text-warning"},3:{title:"Failed",class:"text-danger"},4:{title:"Cancelled",class:"text-secondary"}};if(s.length){var o=s.DataTable({ajax:assetsPath+"json/ecommerce-customer-order.json",columns:[{data:"id"},{data:"id"},{data:"order"},{data:"date"},{data:"customer"},{data:"payment"},{data:"status"},{data:"method"},{data:""}],columnDefs:[{className:"control",searchable:!1,orderable:!1,responsivePriority:2,targets:0,render:function(e,t,a,s){return""}},{targets:1,orderable:!1,checkboxes:{selectAllRender:'<input type="checkbox" class="form-check-input">'},render:function(){return'<input type="checkbox" class="dt-checkboxes form-check-input" >'},searchable:!1},{targets:2,render:function(e,t,a,s){var n=a.order;return'<a href="'+baseUrl+'app/ecommerce/order/details"><span>#'+n+"</span></a>"}},{targets:3,render:function(e,t,a,s){var n=new Date(a.date),r=a.time.substring(0,5);return'<span class="text-nowrap">'+n.toLocaleDateString("en-US",{month:"short",day:"numeric",year:"numeric",time:"numeric"})+", "+r+"</span>"}},{targets:4,responsivePriority:1,render:function(e,t,a,s){var n=a.customer,r=a.email,o=a.avatar;if(o)var i='<img src="'+assetsPath+"img/avatars/"+o+'" alt="Avatar" class="rounded-circle">';else{var l=["success","danger","warning","info","dark","primary","secondary"][Math.floor(6*Math.random())],d=(n=a.customer).match(/\b\w/g)||[];i='<span class="avatar-initial rounded-circle bg-label-'+l+'">'+(d=((d.shift()||"")+(d.pop()||"")).toUpperCase())+"</span>"}return'<div class="d-flex justify-content-start align-items-center user-name"><div class="avatar-wrapper me-3"><div class="avatar avatar-sm">'+i+'</div></div><div class="d-flex flex-column"><a href="'+baseUrl+'pages/profile-user" class="text-truncate"><span class="text-heading fw-medium" > '+n+'</span></a><small class="text-truncate">'+r+"</small></div></div>"}},{targets:5,render:function(e,t,a,s){var n=a.payment,o=r[n];return o?'<h6 class="mb-0 w-px-100 '+o.class+'"><i class="mdi mdi-circle mdi-14px me-2"></i>'+o.title+"</h6>":e}},{targets:-3,render:function(e,t,a,s){var r=a.status;return'<span class="badge px-2 rounded-pill '+n[r].class+'" text-capitalized>'+n[r].title+"</span>"}},{targets:-2,render:function(e,t,a,s){var n=a.method,r=a.method_number;return"paypal_logo"==n&&(r="@gmail.com"),'<div class="d-flex align-items-center text-nowrap"><img src="'+assetsPath+"img/icons/payments/"+n+'.png" alt="'+n+'" class="me-2" width="20"><span><i class="mdi mdi-dots-horizontal"></i>'+r+"</span></div>"}},{targets:-1,title:"Actions",searchable:!1,orderable:!1,render:function(e,t,a,s){return'<div><button class="btn btn-sm btn-icon dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></button><div class="dropdown-menu dropdown-menu-end m-0"><a href=" '+baseUrl+'app/ecommerce/order/details" class="dropdown-item">View</a><a href="javascript:0;" class="dropdown-item delete-record">Delete</a></div></div>'}}],order:[3,"asc"],dom:'<"card-header d-flex flex-column flex-md-row align-items-start align-items-md-center"<f><"d-flex align-items-md-center justify-content-md-end mt-2 mt-md-0 ps-1 ms-1 gap-3"l<"dt-action-buttons"B>>>t<"row mx-1"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',lengthMenu:[10,40,60,80,100],language:{sLengthMenu:"_MENU_",search:"",searchPlaceholder:"Search Order",info:"Displaying _START_ to _END_ of _TOTAL_ entries"},buttons:[{extend:"collection",className:"btn btn-label-secondary dropdown-toggle",text:'<i class="mdi mdi-export-variant me-1"></i> <span class="d-none d-sm-inline-block">Export</span>',buttons:[{extend:"print",text:'<i class="mdi mdi-printer-outline me-1" ></i>Print',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(e,t,a){if(e.length<=0)return e;var s=$.parseHTML(e),n="";return $.each(s,(function(e,t){void 0!==t.classList&&t.classList.contains("user-name")?n+=t.lastChild.firstChild.textContent:void 0===t.innerText?n+=t.textContent:n+=t.innerText})),n}}},customize:function(s){$(s.document.body).css("color",a).css("border-color",e).css("background-color",t),$(s.document.body).find("table").addClass("compact").css("color","inherit").css("border-color","inherit").css("background-color","inherit")}},{extend:"csv",text:'<i class="mdi mdi-file-document-outline me-1" ></i>Csv',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(e,t,a){if(e.length<=0)return e;var s=$.parseHTML(e),n="";return $.each(s,(function(e,t){void 0!==t.classList&&t.classList.contains("user-name")?n+=t.lastChild.firstChild.textContent:void 0===t.innerText?n+=t.textContent:n+=t.innerText})),n}}}},{extend:"excel",text:'<i class="mdi mdi-file-excel-outline me-1"></i>Excel',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(e,t,a){if(e.length<=0)return e;var s=$.parseHTML(e),n="";return $.each(s,(function(e,t){void 0!==t.classList&&t.classList.contains("user-name")?n+=t.lastChild.firstChild.textContent:void 0===t.innerText?n+=t.textContent:n+=t.innerText})),n}}}},{extend:"pdf",text:'<i class="mdi mdi-file-pdf-box me-1"></i>Pdf',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(e,t,a){if(e.length<=0)return e;var s=$.parseHTML(e),n="";return $.each(s,(function(e,t){void 0!==t.classList&&t.classList.contains("user-name")?n+=t.lastChild.firstChild.textContent:void 0===t.innerText?n+=t.textContent:n+=t.innerText})),n}}}},{extend:"copy",text:'<i class="mdi mdi-content-copy me-1"></i>Copy',className:"dropdown-item",exportOptions:{columns:[1,2,3,4,5],format:{body:function(e,t,a){if(e.length<=0)return e;var s=$.parseHTML(e),n="";return $.each(s,(function(e,t){void 0!==t.classList&&t.classList.contains("user-name")?n+=t.lastChild.firstChild.textContent:void 0===t.innerText?n+=t.textContent:n+=t.innerText})),n}}}}]}],responsive:{details:{display:$.fn.dataTable.Responsive.display.modal({header:function(e){return"Details of "+e.data().customer}}),type:"column",renderer:function(e,t,a){var s=$.map(a,(function(e,t){return""!==e.title?'<tr data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><td>'+e.title+":</td> <td>"+e.data+"</td></tr>":""})).join("");return!!s&&$('<table class="table"/><tbody />').append(s)}}}});$(".dataTables_length").addClass("mt-0 mt-md-3"),$(".dt-action-buttons").addClass("pt-0")}$(".datatables-order tbody").on("click",".delete-record",(function(){o.row($(this).parents("tr")).remove().draw()})),setTimeout((()=>{$(".dataTables_filter .form-control").removeClass("form-control-sm"),$(".dataTables_length .form-select").removeClass("form-select-sm")}),300)}));
