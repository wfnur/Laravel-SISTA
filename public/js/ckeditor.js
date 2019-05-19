$(document).ready(function() {
    

    if($("#biaya").length > 0){
      CKEDITOR.replace( 'biaya',{
        height: 300,
        toolbarGroups: [
          {
            "name": "basicstyles",
            "groups": ["basicstyles"]
          },
          {
            "name": "paragraph",
            "groups": [ 'indent', 'align',  'paragraph' ] 
          },
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },
          { "name": 'colors',
            "groups" : [ 'TextColor','BGColor' ] },        
        ],
      });
    }

    if($("#jadwal_kegiatan").length > 0){
      CKEDITOR.replace( 'jadwal_kegiatan',{
        height: 300,
        toolbarGroups: [
          {
            "name": "basicstyles",
            "groups": ["basicstyles"]
          },
          {
            "name": "paragraph",
            "groups": [ 'indent', 'align',  'paragraph' ] 
          },
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },
          { "name": 'colors',
            "groups" : [ 'TextColor','BGColor' ] },        
        ],
      });
    }

    if($("#justifikasi_anggaran").length > 0){
      CKEDITOR.replace( 'justifikasi_anggaran',{
        height: 500,
        toolbarGroups: [
          {
            "name": "basicstyles",
            "groups": ["basicstyles"]
          },
          {
            "name": "paragraph",
            "groups": [ 'indent', 'align',  'paragraph' ] 
          },
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },
          { "name": 'colors',
            "groups" : [ 'TextColor','BGColor' ] },        
        ],
      });
    }

    if($("#justifikasi_anggaran_before").length > 0){
      CKEDITOR.replace( 'justifikasi_anggaran_before',{
        height: 200,
        toolbarGroups: [
          {
            "name": "basicstyles",
            "groups": ["basicstyles"]
          },
          {
            "name": "paragraph",
            "groups": [ 'indent', 'align',  'paragraph' ] 
          },
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },
          { "name": 'colors',
            "groups" : [ 'TextColor','BGColor' ] },        
        ],
      });
    }

    if($("#abstrak_ind").length > 0){
        CKEDITOR.replace( 'abstrak_ind',{
            height: 100,
            toolbarGroups: [
              {
                "name": "basicstyles",
                "groups": ["basicstyles"]
              },
              {
                "name": "paragraph",
                "groups": [ 'indent', 'align', 'paragraph' ] 
              },
              { "name": 'tools', 
                "groups": [ 'tools' ] 
              },        
            ],
        });
    }

    if($("#abstrak_eng").length > 0){
        CKEDITOR.replace( 'abstrak_eng',{
            height: 100,
            toolbarGroups: [
              {
                "name": "basicstyles",
                "groups": ["basicstyles"]
              },
              {
                "name": "paragraph",
                "groups": [ 'indent', 'align', 'paragraph' ] 
              },
              { "name": 'tools', 
                "groups": [ 'tools' ] 
              },        
            ],
        });
    }

    if($("#pustaka_2_before").length > 0){
      CKEDITOR.replace( 'pustaka_2_before',{
        height: 100,
        toolbarGroups: [
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },        
        ],
      });      
    }

    if($("#pustaka_2").length > 0){
      CKEDITOR.replace( 'pustaka_2',{
        height: 100,
        toolbarGroups: [
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },
          { "name": 'insert', 
            "groups": [ "Table" ] 
          },        
        ],
      });      
    }

    if($("#biaya_sebelumnya").length > 0){
      CKEDITOR.replace( 'biaya_sebelumnya',{
        height: 100,
        toolbarGroups: [
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },    
        ],
      });      
    }

    if($("#jadwal_kegiatan_sebelumnya").length > 0){
      CKEDITOR.replace( 'jadwal_kegiatan_sebelumnya',{
        height: 100,
        toolbarGroups: [
          { "name": 'tools', 
            "groups": [ 'tools' ] 
          },       
        ],
      });      
    }

   

  });