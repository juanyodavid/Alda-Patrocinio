
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `fac_tarea` FOREIGN KEY (`id_facilitador`) REFERENCES `facilitador` (`id_facilitador`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tarea` FOREIGN KEY (`eliminar`) REFERENCES `beneficiario_interno` (`CLIENT_ID`) ON DELETE NO ACTION ON UPDATE CASCADE;
