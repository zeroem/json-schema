# TODO
  - Compile JSON schema to object graph
  - Optimize object graph.
    - Repliace collections of one constraint with that constraint
    - not sure that this situation would ever occur, save for poorly formed schemas
  - Cache compiled object graphs as serialized to files/memcache
  - Investigate optimizing object graph to procedural PHP code
  - Extract getSchema logic to the schema resolver
  - Extract TypeFactory and custom type handling to a TypeResolver
