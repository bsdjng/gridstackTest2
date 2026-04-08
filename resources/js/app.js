import 'gridstack/dist/gridstack.min.css';
import { GridStack } from 'gridstack';
window.GridStack = GridStack;
// class VoodooEngine extends GridStackEngine {

    // prepareNode(node) {
    //     console.log(node)
    //     node.h = 1
    //     node.w = 1
    //     var preparedNode = ""
    //     return preparedNode = super.prepareNode(node);
    // }

//     nodeBoundFix(preparedNode) {
//         console.log(preparedNode)
//         return super.nodeBoundFix(preparedNode);
//     }
// }

// GridStack.registerEngine(VoodooEngine); // globally set our custom class

// function isGridFull(grid, maxCols, maxRows) {
//     for (let y = 0; y < maxRows; y++) {
//         for (let x = 0; x < maxCols; x++) {
//             if (grid.isAreaEmpty(x, y, 1, 1)) {
//                 return false;
//             }
//         }
//     }
//     return true;
// }
