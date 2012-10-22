# TODO
  - Compile JSON schema to object graph
  - Optimize object graph.
    - Repliace collections of one constraint with that constraint
    - not sure that this situation would ever occur, save for poorly formed schemas
  - Cache compiled object graphs as serialized to files/memcache
  - Investigate optimizing object graph to procedural PHP code
  - Extract Property specific logic to independent classes
    - Inputs are the current schema and a reference to the compiler
