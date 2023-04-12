<?php

$service = new MapService();
$data = $service->prepare_mind_wired_data($_SESSION["user"]["user_guid"]);

?>

<link rel="stylesheet" href="../../vendor/mind-wired-master/dist/mind-wired.css" />
<script src="../../vendor/mind-wired-master/dist/mind-wired.js"></script>

    <div class="help">
        <div class="tip">
            <div>
                <span class="key">enter</span></div><div class="desc">new sibling node
            </div>
        </div>
        <div class="tip">
            <div>
                <span class="key">shift+enter</span>
            </div>
            <div class="desc">new child node</div>
        </div>
        <div class="tip">
            <div>
                <span class="key">space</span>
            </div>
            <div class="desc">start editing</div>
        </div>
        <div class="tip">
            <div>
                <span class="key">del</span>
            </div>
            <div class="desc">delete node</div>
        </div>
    </div>
    <div id="mmap-root" class="map-workspace"></div>

<script>

// https://github.com/yeori/mind-wired

let liveMaster = {
    model: {
        type: 'text',
        text: '<?php echo $_SESSION['user']['username'] ?>'
    },
    view: {
        x: 0,
        y: 0,
        layout: { type: 'X-AXIS' },
        edge: {
            name: 'mustache_lr'
        }
    },
    subs: []
};

let master_subs = <?php echo $data ?>;
liveMaster.subs = master_subs;

let mwd; 
window.mindwired
.init({
    el: "#mmap-root",
    ui: {
        width: "100vw",
        height: "100vh",
        scale: 1.0,
        class: {
            node: "active-node",
            edge: "active-edge",
            schema: (schemaName) => schemaName,
            level: (level) => `level-${level}`,
        },
        offset: { x: 0, y: 0 },
        snap: {
            limit: 4,
            width: 0.4,
            dash: [6, 2],
            color: { horizontal: "orange", vertical: "#2bc490" },
        },
        selection: {
            padding: 5,
            "background-color": "#b3ddff6b",
            "border-radius": "4px",
        },
    }
})
.then((instance) => {
    mwd = instance;
    mwd.listen('node.created', (e) => {
        const { nodes } = e;
        console.log('[CREATED]', nodes);
    });
    mwd.listen('node.created', (e) => {
        const { nodes } = e;
        console.log('[CREATED]', nodes);
    });
    mwd.listen('node.updated', (e) => {
        const {nodes, type} = e;
        console.log('[UPDATED]', nodes, type);
    });
    mwd.listen('node.deleted', (e) => {
        const {nodes} = e;
        console.log('[DELETED]', nodes);
    });

  mwd.nodes(liveMaster);

});
</script>













<!-- <ul class="draggable-list" id="dragon-list"></ul>
<script src="../../js/dragon.js"></script>
<ul class="draggable-list" id="dragon-list">
    <?php foreach($thoughts as $row=>$data): ?>
        <li id="<?= $data['id']; ?>">
            <div class="draggable" draggable="true">
                <i><?= date('F d, Y \a\t H:i A', strtotime($data["date"])); ?></i>
                <i class="thought-analysis-score"><?= analyze($data["thought"]); ?></i>
                <b><?= $data["title"]; ?></b> | 
                <p class="person-name">
                    <span class="text-overflow-hidden">
                        <?= $data["thought"]; ?>
                    </span>
                </p>
                <a href="edit?&thought_id=<?php echo $data["id"]; ?>">edit</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<script src="../../js/dragon.js"></script> -->
<script>
// let touchstartX = 0
// let touchendX = 0
    
// function sideswipe() {

//     //   if (touchendX > touchstartX) alert('swiped right!');
//     if (touchendX < touchstartX) {
//         // swipe left
//         console.log('swipe left');
//     }

// }

// let items = document.querySelectorAll('.dragon-item');

// console.log(items);

// items.forEach(element => {
//     element.addEventListener('touchstart', e => {
//         touchstartX = e.changedTouches[0].screenX;
//         console.log('touch start');
//     });

//     element.addEventListener('touchend', e => {
//         touchendX = e.changedTouches[0].screenX;
//         console.log('touch end');
//         sideswipe();
//     });

//     element.addEventListener("touchmove", (event) => {});

// });

// function myFunction(item, index, arr) {
//   arr[index] = item * 10;
// }
</script>
<!-- 
{
  "model": {
    "type": "text",
    "text": "Mind-Wired"
  },
  "view": {
    "x": 0,
    "y": 0,
    "layout": {
      "type": "X-AXIS"
    },
    "edge": {
      "name": "mustache_lr",
      "color": "#9aabaf",
      "width": 1
    }
  },
  "subs": [
    {
      "model": {
        "text": "Mindmap Javascript Library\n(with memo schema)",
        "schema": "memo"
      },
      "view": {
        "x": 0,
        "y": -150,
        "edge": {
          "name": "line",
          "color": "#9a9c12",
          "width": 1
        }
      },
      "subs": []
    },
    {
      "model": {
        "text": "Configuration"
      },
      "view": {
        "x": 160,
        "y": 80
      },
      "subs": []
    },
    {
      "model": {
        "text": "Node"
      },
      "view": {
        "x": -140,
        "y": -80
      },
      "subs": [
        {
          "model": {
            "text": "text"
          },
          "view": {
            "x": -100,
            "y": -40
          },
          "subs": []
        },
        {
          "model": {
            "text": "badge"
          },
          "view": {
            "x": -100,
            "y": 0
          },
          "subs": []
        },
        {
          "model": {
            "text": "thumnail"
          },
          "view": {
            "x": -100,
            "y": 40
          },
          "subs": []
        }
      ]
    },
    {
      "model": {
        "text": "Edge"
      },
      "view": {
        "x": -140,
        "y": 80
      },
      "subs": [
        {
          "model": {
            "text": "LINE"
          },
          "view": {
            "x": -100,
            "y": -40
          },
          "subs": []
        },
        {
          "model": {
            "text": "mustache_lr"
          },
          "view": {
            "x": -100,
            "y": 0
          },
          "subs": []
        },
        {
          "model": {
            "text": "mustache_tb"
          },
          "view": {
            "x": -100,
            "y": 40
          },
          "subs": []
        }
      ]
    },
    {
      "model": {
        "text": "Layout"
      },
      "view": {
        "x": 140,
        "y": -80
      },
      "subs": [
        {
          "model": {
            "text": "DEFAULT"
          },
          "view": {
            "x": 100,
            "y": -40
          },
          "subs": []
        },
        {
          "model": {
            "text": "X-AXIS"
          },
          "view": {
            "x": 100,
            "y": 0
          },
          "subs": []
        },
        {
          "model": {
            "text": "Y-AXIS"
          },
          "view": {
            "x": 100,
            "y": 40
          },
          "subs": []
        }
      ]
    }
  ]
} -->