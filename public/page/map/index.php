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